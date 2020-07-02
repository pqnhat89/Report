<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conditions = getConditions();

        $reports = Reports::where($conditions)
            ->orderBy('id', 'desc')
            ->get();

        return view('report.index', ['reports' => $reports]);
    }

    public function create(Request $request)
    {
        return view("report." . $request->type . ".edit");
    }

    public function save(Request $request)
    {
        dd($request->all());
    }
}
