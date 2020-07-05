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
    const DINH_DUONG = "BÁO CÁO HOẠT ĐỘNG CẢI THIỆN TÌNH TRẠNG DINH DƯỠNG TRẺ EM 2020";
    const HIV = "BÁO CÁO KẾT QUẢ SÀNG LỌC HIV";

    public static function getTitle($type){
        return self::toArray()[$type] ?? null;
    }
}
