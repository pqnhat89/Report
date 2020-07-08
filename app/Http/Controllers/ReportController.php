<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Reports;
use App\Exports\Export;
use Illuminate\Http\Request;
use Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $conditions = getConditions();

        $reports = Reports::where($conditions)
            ->orderBy('id', 'desc')
            ->paginate(50)
            ->appends($request->all());

        return view('report.index', ['reports' => $reports]);
    }

    public function show(Request $request)
    {
        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->first();

        if ($request->export) {
            return Excel::download(new Export($report, $request->type == 'B11'), "[" . $report->year . "][" . $report->month . "][" . $report->type . "][" . $report->location . "].xls");
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
                ->where('status', Status::UNLOCK)
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
        Reports::where($conditions)
            ->where('status', Status::UNLOCK)
            ->delete();
        return redirect()->back()->withErrors("<span class='text-success'>Xóa báo cáo thành công !!!</span>");
    }
}
