<?php

namespace App\Services;

use App\Models\Reports;

class SKSSB4Service
{
    public static function index()
    {
        $conditions = getConditions();

        $b4 = Reports::where($conditions)
            ->orderBy('id', 'desc')
            ->get();

        return view('skss.b4.index', ['b4' => $b4]);
    }
}
