<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class Export implements FromView
{
    private static $report;

    public function __construct($report)
    {
        self::$report = $report;
    }

    public function view(): View
    {
        return view('report.' . request()->type . '.show-template', [
            'report' => self::$report
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->styleCells(
                    'A2:W2',
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'font' => [
                            'name' => 'Century Gothic',
                            'size' => 31,
                            'bold' => true,
                            'color' => ['argb' => 'EB2B02'],
                        ]
                    ]
                );
            },
        ];
    }
}
