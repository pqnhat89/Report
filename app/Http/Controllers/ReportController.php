<?php

namespace App\Http\Controllers;

use App\Enums\FileNames;
use App\Enums\Status;
use App\Models\Reports;
use App\Exports\Export;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $conditions = getConditions();

        if ($request->status !== null) {
            $conditions['status'] = $request->status;
        }

        $reports = Reports::where($conditions)
            ->orderBy('id', 'desc')
            ->paginate(50)
            ->appends($request->all());

        $view = "report.index";
        if (in_array($request->type, FileNames::key())) {
            $view = "file.index";
        }

        return view($view, ['reports' => $reports]);
    }

    public function show(Request $request)
    {

        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->first();

        if (in_array($request->type, FileNames::key())) {
            return response()->download(storage_path($report->filepath));
        }

        if ($request->export) {
            $request->month = $report->month;
            $request->year = $report->year;
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
        unset($conditions['month']);
        unset($conditions['year']);
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
                    $conditions
                )
            );
        }
        return redirect()->route('report.index', ['type' => $request->type])
            ->withErrors("<span class='text-success'>Lưu báo cáo thành công.</span>");
    }

    public function delete(Request $request, $id)
    {
        $conditions = getConditions();

        $report = Reports::where($conditions)
            ->where('status', Status::UNLOCK)
            ->first();

        if ($report) {
            // delete file
            Storage::disk('storage')->delete($report->filepath);

            // delete report
            Reports::where($conditions)
                ->where('status', Status::UNLOCK)
                ->delete();
        }

        return redirect()->back()->withErrors("<span class='text-success'>Xóa báo cáo thành công.</span>");
    }
}
