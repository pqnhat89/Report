<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getConditions()
{
    $conditions = [];

    if (request()->type){
        $conditions['type'] = \App\Enums\Types::getTitle(request()->type);
    }

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

    if (request()->year) {
        $conditions['year'] = request()->year;
    }

    return $conditions;
}

function getSumColumns()
{
    $columns = [];
    for ($i = 0; $i <= 100; $i++) {
        $column = \PHPExcel_Cell::stringFromColumnIndex($i);
        $columns[] = DB::raw("SUM($column) as $column");
    }
    return $columns;
}
