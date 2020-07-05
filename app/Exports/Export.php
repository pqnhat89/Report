<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class Export implements FromView
{
    private static $report;
    private static $reports;

    public function __construct($report)
    {
        if (count($report) > 1) {
            self::$reports = $report;
        } else {
            self::$report = $report;
        }
    }

    public function view(): View
    {
        return view('report.' . request()->type . '.show-template', [
            'report' => self::$report,
            'reports' => self::$reports
        ]);
    }
}
