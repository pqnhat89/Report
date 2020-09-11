<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Facades\Auth;

class UserRole extends Enum
{
    const Admin = 1;
    const NormalUser = 0;
    const Department = 2;

    private static $title = [
        self::Admin => "ADMIN (quản trị)",
        self::NormalUser => "CƠ SỞ",
        self::Department => "PHÒNG BAN",
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

    public static function isDepartment()
    {
        return Auth::user()->role == self::Department;
    }

}
