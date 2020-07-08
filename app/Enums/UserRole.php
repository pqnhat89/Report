<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Facades\Auth;

class UserRole extends Enum
{
    const Admin = 1;
    const NormalUser = 0;

    private static $title = [
        self::Admin => "Thành phố",
        self::NormalUser => "Cơ sở"
    ];

    public static function getTitle($key)
    {
        return self::$title[$key] ?? null;
    }

    public static function isAdmin()
    {
        return Auth::user()->role == self::Admin;
    }

    public static function isNormalUser()
    {
        return Auth::user()->role == self::NormalUser;
    }

}
