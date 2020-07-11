<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Months extends Enum
{
    const Loai3Thang = "3 tháng";
    const Loai6Thang = "6 tháng";
    const Loai9Thang = "9 tháng";
    const Loai12Thang = "12 tháng";

    public static function monthsOfYear()
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = "Tháng $i";
        }
        return $months;
    }
}
