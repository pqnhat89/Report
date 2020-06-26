<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

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
}
