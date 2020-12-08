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
            $months["Tháng $i"] = "Tháng $i";
        }
        return $months;
    }

    public static function quartersOfYear()
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            if ($i % 3 == 0) {
                $m1 = $i - 2;
                $m2 = $i - 1;
                $m3 = $i;
                $months["$i tháng"] = "$i tháng (tháng $m1, $m2, $m3)";
            }
        }
        return $months;
    }

    public static function getHtml()
    {
        $html = "<div class='text-center'>Tháng</div>";
        $html .= "<select class='form-control' name='month' required>";
        $html .= "<option value=''>Vui lòng chọn Tháng ...</option>";
        foreach (self::monthsOfYear() as $month) {
            $selected = request()->month == $month ? 'selected' : null;
            $html .= "<option value='$month' $selected>$month</option>";
        }
        $html .= "</select>";
        return $html;
    }
}
