<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Facades\Auth;

class UserRole extends Enum
{
    const Admin = 2;
    const NormalUser = 1;
    const NewUser = 0;

    private static $title = [
        self::Admin => "Thành phố",
        self::NormalUser => "Quận/Huyện",
        self::NewUser => "Đăng ký mới",
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

    public static function isNewUser()
    {
        return Auth::user()->role == self::NewUser;
    }
}
