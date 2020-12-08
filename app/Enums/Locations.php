<?php

namespace App\Enums;

use App\User;
use App\Enums\Types;
use MyCLabs\Enum\Enum;

class Locations extends Enum
{
    // tỉnh
    const BV_PHUSAN_NHI = "Bệnh viện Phụ sản - Nhi";
    const BV_DANANG = "Bệnh viện Đà Nẵng";
    const TT_KIEMSOATBENHTAT = "Trung tâm Kiểm soát bệnh tật";
    const BV_PHUBU = "Bệnh viện Phụ Nữ";

    // huyện
    const HAICHAU = "Hải Châu";
    const THANHKHE = "Thanh Khê";
    const SONTRA = "Sơn Trà";
    const LIENCHIEU = "Liên Chiểu";
    const NGUHANHSON = "Ngũ Hành Sơn";
    const CAMLE = "Cẩm Lệ";
    const HOAVANG = "Hòa Vang";

    // tư nhân
    const BV_HOANMY = "Bệnh viện Hoàn Mỹ";
    const BV_GIADINH = "Bệnh viện Gia Đình";
    const BV_TAMTRI = "Bệnh viện Tâm Trí";
    const BV_BINHDAN = "Bệnh viện Bình Dân";
    const BV_VINMEC = "Bệnh viện Vinmec";

    public static $tuyenTinh = [
        self::BV_PHUSAN_NHI,
        self::BV_DANANG,
        self::TT_KIEMSOATBENHTAT,
        self::BV_PHUBU
    ];

    public static $tuyenHuyen = [
        self::HAICHAU,
        self::THANHKHE,
        self::SONTRA,
        self::LIENCHIEU,
        self::NGUHANHSON,
        self::CAMLE,
        self::HOAVANG
    ];

    public static $tuNhan = [
        self::BV_HOANMY,
        self::BV_GIADINH,
        self::BV_TAMTRI,
        self::BV_BINHDAN,
        self::BV_VINMEC
    ];

    public static function count()
    {
        if (in_array(request()->type, ['B11', 'DINH_DUONG', 'HIV'])) {
            return count(self::$tuyenHuyen);
        }
        return count(self::toArray());
    }

    public static function toArray()
    {
//        if (in_array(request()->type, Types::keys())) {
//            return parent::toArray();
//        } else {
            return User::whereNotNull('location')
                ->select('location')
                ->orderBy('location')
                ->get()
                ->pluck('location')
                ->toArray();
//        }
    }
}
