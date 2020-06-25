<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class LoaiBaoCao extends Enum
{
    const Loai3Thang = "3-thang";
    const Loai6Thang = "6-thang";
    const Loai9Thang = "9-thang";
    const Loai12Thang = "12-thang";

    private static $title = [
        self::Loai3Thang => "3 tháng",
        self::Loai6Thang => "6 tháng",
        self::Loai9Thang => "9 tháng",
        self::Loai12Thang => "12 tháng",
    ];

    public static function getTitle($key)
    {
        return self::$title[$key] ?? null;
    }
}
