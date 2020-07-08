<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class Export implements FromView, WithEvents
{
    private static $report;
    private static $reports;
    private static $multi;

    public function __construct($report, $multi = false)
    {
        self::$multi = $multi;
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // get current sheet
                $sheet = $event->sheet->getDelegate();

                // set width
                for ($i = 0; $i <= 100; $i++) {
                    $column = \PHPExcel_Cell::stringFromColumnIndex($i);
                    $sheet->getColumnDimension($column)->setWidth(10);
                }
                if (self::$multi) {
                    $sheet->getColumnDimension('B')->setWidth(20);
                    $sheet->getColumnDimension('X')->setWidth(20);
                    $sheet->getColumnDimension('AT')->setWidth(20);
                } else {
                    $sheet->getColumnDimension('B')->setWidth(30);
                }

                // set font
                $sheet->getStyle('A1:BR50')
                    ->applyFromArray([
                        'font' => [
                            'name' => 'Times New Roman',
                            'size' => 12
                        ]
                    ]);

                // set wrap
                $sheet->getStyle('A1:BR50')
                    ->getAlignment()
                    ->setVertical('center')
                    ->setWrapText(true);
            },
        ];
    }
}
