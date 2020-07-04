<?php


namespace App\Http\Controllers;


use App\Exports\Export;
use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $conditions = getConditions();

        $reports = Reports::where($conditions)
            ->select('year', 'month', DB::raw('count(location) as count'))
            ->groupBy('year', 'month')
//            ->orderBy('id', 'desc')
            ->get();

        return view('admin.report.index', ['reports' => $reports]);
    }

    public function show(Request $request)
    {
        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->first();

        if ($request->export) {
            return Excel::download(new Export($report), "[" . $report->year . "][" . $report->month . "][" . $report->type . "][" . $report->location . "].xlsx");
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
            ->withErrors("<span class='text-success'>Lưu báo cáo thành công !!!</span>");
    }

    public function delete(Request $request, $id)
    {
        $conditions = getConditions();
        Reports::where($conditions)->delete();
        return redirect()->back()->withErrors("<span class='text-success'>Xóa báo cáo thành công !!!</span>");
    }
}
