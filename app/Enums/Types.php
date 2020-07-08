<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Types extends Enum
{
    const SKSS_B4 = "HOẠT ĐỘNG CHĂM SÓC BÀ MẸ";
    const SKSS_B5 = "TÌNH HÌNH MẮC VÀ TỬ VONG DO TAI BIẾN SẢN KHOA";
    const SKSS_B6 = "HOẠT ĐỘNG KHÁM, CHỮA PHỤ KHOA VÀ SÀNG LỌC UNG THƯ CỔ TỬ CUNG";
    const SKSS_B7 = "HOẠT ĐỘNG KHHGĐ VÀ PHÁ THAI";
    const SKSS_B8 = "TÌNH HÌNH SỨC KHỎE TRẺ EM";
    const SKSS_THEM = "CHỈ TIÊU KHÁC";

    const B11 = "TÌNH HÌNH MẮC VÀ TỬ VONG BỆNH TRUYỀN NHIỄM GÂY DỊCH";
    const DINH_DUONG = "BÁO CÁO HOẠT ĐỘNG CẢI THIỆN TÌNH TRẠNG DINH DƯỠNG TRẺ EM";
    const HIV = "BÁO CÁO KẾT QUẢ SÀNG LỌC HIV";

    private static $titles = [
        self::SKSS_B4 => 'Biểu số: 4/BCH',
        self::SKSS_B5 => 'Biểu số: 5/BCH',
        self::SKSS_B6 => 'Biểu số: 6/BCH',
        self::SKSS_B7 => 'Biểu số: 7/BCH',
        self::SKSS_B8 => 'Biểu số: 8/BCH',
        self::SKSS_THEM => 'Biểu số: 8/BCH',
        self::B11 => 'Biểu: 11.XXX/BCH',
        self::DINH_DUONG => '',
        self::HIV => 'xxx',
    ];

    public static function getTitle($type)
    {
        return self::toArray()[$type] ?? null;
    }

    private static $i = 1;

    public static function getTitle2($type)
    {
        $title = self::$titles[self::toArray()[$type]] ?? null;
        if (self::toArray()[$type] == self::B11) {
            $title = str_replace('XXX', self::$i++, $title);
        }
        return $title;
    }
}
