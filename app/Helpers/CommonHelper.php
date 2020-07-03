<?php

use App\Enums\Types;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

function getConditions()
{
    $conditions = [
        'type' => Types::toArray()[request()->type],
        'location' => Auth::user()->location,
    ];

    if (UserRole::isAdmin()) {
        $conditions['location'] = request()->location;
    }

    if (request()->id) {
        $conditions['id'] = request()->id;
    }

    if (request()->month) {
        $conditions['month'] = request()->month;
    }

    return $conditions;
}
