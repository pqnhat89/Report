<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class FileNames extends Enum
{
    const TNLD_ND39 = "Báo cáo Tai Nạn Lao Động_Nghị định 39.doc";
    const YTLD_PL9 = "Báo cáo Y Tế Lao Động_Phụ lục 9_Thông tư 19_2016.doc";
    const VSMT = "Báo cáo Vệ Sinh Môi Trường.doc";
    const YTTH = "Báo cáo Y Tế Trường Học.doc";
    const TT = "Báo cáo khoa Truyền Thông.doc";
    const KSTCT_1 = "KST-CT - BC năm.doc";
    const KSTCT_2 = "KST-CT - BC tháng.xls";

    public static function key()
    {
        return array_keys(self::toArray());
    }

    public static function value()
    {
        return self::toArray();
    }

    public static function getTitle($type)
    {
        return self::toArray()[$type] ?? null;
    }
}
