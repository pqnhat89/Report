<?php

namespace App\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SkssB4Export implements FromView
{
    private static $b4;

    public function __construct($b4)
    {
        self::$b4 = $b4;
    }

    public function view(): View
    {
        return view('skss.b4.show-template', [
            'b4' => self::$b4
        ]);
    }
}
