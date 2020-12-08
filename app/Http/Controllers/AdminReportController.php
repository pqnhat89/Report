<?php


namespace App\Http\Controllers;

use App\Exports\Export;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use Zip;

class AdminReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('department');
    }

    public function index(Request $request)
    {
        $conditions = getConditions();

        if ($request->status !== null) {
            $conditions['status'] = $request->status;
        }

        $reports = Reports::where($conditions)
            ->select(
                'year',
                'month',
                DB::raw('count(location) as count'),
                DB::raw('sum(status) as status')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->paginate(50)
            ->appends($request->all());

        return view('admin.report.index', ['reports' => $reports]);
    }

    private static function parseMonthToInt($month)
    {
        return trim(str_replace(['Tháng', 'tháng'], ['', ''], $month));
    }

    private static function parseDateToInt($month, $year)
    {
        return (int)($year . str_pad(self::parseMonthToInt($month), 2, 0, STR_PAD_LEFT));
    }

    public function sum(Request $request)
    {
        // check inrange
        $inRange = $request->frommonth && $request->fromyear && $request->tomonth && $request->toyear;

        // get conditions
        $conditions = $newConditions = getConditions();
        unset($newConditions['month']);
        $month = self::parseMonthToInt($conditions['month']);

        if ($inRange) {
            unset($newConditions['year']);
            $reports = Reports::where('type', $newConditions)
                ->whereRaw("CONCAT(`year`, LPAD(TRIM(REPLACE(REPLACE(`month`, 'tháng', ''), 'Tháng', '')), 2, 0)) >= ?", self::parseDateToInt($request->frommonth, $request->fromyear))
                ->whereRaw("CONCAT(`year`, LPAD(TRIM(REPLACE(REPLACE(`month`, 'tháng', ''), 'Tháng', '')), 2, 0)) <= ?", self::parseDateToInt($request->tomonth, $request->toyear))
                ->get();
        } else {
            $reports = Reports::where($newConditions)
                ->whereRaw("TRIM(REPLACE(`month`, 'tháng', '')) <= ?", $month)
                ->get();
        }

        if (isDownloadFile()) {
            $year = $conditions['year'];
            $month = $conditions['month'];
            $type = $conditions['type'];
            $zip = Zip::create("[$year][$month]$type.zip");
            foreach ($reports as $report) {
                $zip->add("storage/" . $report->filepath);
            }
            $zip->close();
            return response()->download("[$year][$month]$type.zip")->deleteFileAfterSend(true);
        }

        if ($request->export) {
            if ($inRange) {
                return Excel::download(new Export($reports, true), "[Từ " . self::parseMonthToInt($request->frommonth) . "-" . $request->fromyear . " đến " . self::parseMonthToInt($request->tomonth) . "-" . $request->toyear . "][" . $conditions['type'] . "].xls");
            } else {
                return Excel::download(new Export($reports, true), "[" . $conditions['year'] . "][" . $conditions['month'] . "][" . $conditions['type'] . "].xls");
            }
        }

        return view(
            "report." . $request->type . ".show",
            ['reports' => $reports]
        );
    }

    public function show(Request $request)
    {
        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->first();

        if ($request->export) {
            return Excel::download(new Export($report), "[" . $report->year . "][" . $report->month . "][" . $report->type . "][" . $report->location . "].xls");
        }

        return view(
            "report." . $request->type . ".show",
            ['report' => $report]
        );
    }

    public function create(Request $request)
    {
        return view("report." . $request->type . ".edit");
    }

    public function edit(Request $request)
    {
        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->first();

        return view(
            "report." . $request->type . ".edit",
            ['report' => $report]
        );
    }

    public function save(Request $request)
    {
        $inputs = $request->except('_token');
        $conditions = getConditions();
        $year = now()->format('Y');
        if ($request->id) {
            // edit
            Reports::where($conditions)
                ->update($inputs);
        } else {
            // new
            Reports::insert(
                array_merge(
                    $inputs,
                    $conditions,
                    ['year' => $year]
                )
            );
        }
        return redirect()->route('report.index', ['type' => $request->type])
            ->withErrors("<span class='text-success'>Lưu báo cáo thành công.</span>");
    }

    public function delete(Request $request, $id)
    {
        $conditions = getConditions();
        Reports::where($conditions)->delete();
        return redirect()->back()->withErrors("<span class='text-success'>Xóa báo cáo thành công.</span>");
    }

    public function lock(Request $request)
    {
        $conditions = getConditions();

        Reports::where($conditions)
            ->update([
                'status' => $request->status
            ]);

        return redirect()->back()->withErrors("<span class='text-success'>Cập nhật trạng thái thành công.</span>");
    }
}
