<?php

use App\Enums\FileNames;
use App\Enums\Types;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getConditions()
{
    $conditions = [];

    if (request()->type) {
        $conditions['type'] = Types::getTitle(request()->type) ?? \App\Enums\FileNames::getTitle(request()->type);
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

function isDownloadFile()
{
    return in_array(request()->type, FileNames::key());
}
