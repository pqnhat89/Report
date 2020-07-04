<?php

use App\Enums\Types;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

function getConditions()
{
    $conditions = [
        'type' => Types::toArray()[request()->type]
    ];

    if (UserRole::isAdmin() && request()->location) {
        $conditions['location'] = request()->location;
    } elseif (UserRole::isNormalUser()) {
        $conditions['location'] = Auth::user()->location;
    }

    if (request()->id) {
        $conditions['id'] = request()->id;
    }

    if (request()->month) {
        $conditions['month'] = request()->month;
    }

    return $conditions;
}

function getSumColumns()
{
    $columns = [];
    for ($i = 0; $i <= 100; $i++) {
        $column = \PHPExcel_Cell::stringFromColumnIndex($i);
        $columns[] = \Illuminate\Support\Facades\DB::raw("SUM($column) as $column");
    }
    return $columns;
}
