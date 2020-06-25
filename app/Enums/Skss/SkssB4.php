<?php

namespace App\Enums\Skss;

use MyCLabs\Enum\Enum;

class SkssB4 extends Enum
{
    const one = "1";
    const onedotone = "";
    const two = "2";
    const twodotone = "";
    const three = "3";
    const threedotone = "3.1";
    const threedottwo = "3.2";
    const threedotthree = "3.3";
    const threedotfour = "3.4";
    const threedotfive = "3.5";
    const threedotsix = "3.6";
    const threedotseven = "3.7";
    const threedoteight = "3.8";
    const threedotnine = "3.9";
    const threedotten = "3.10";
    const four = "4";
    const five = "5";
    const six = "6";
    const sixdotone = "6.1";
    const sixdottwo = "6.2";
    const seven = "7";

    private static $title = [
        self::one => "Phụ nữ có thai",
        self::onedotone => "<i>Trong đó: Vị thành niên</i>",
        self::two => "Số lượt khám thai",
        self::twodotone => "<i>Trong đó: Số lượt XN protein niệu</i>",
        self::three => "Tổng số PN đẻ",
        self::threedotone => "Số đẻ tuổi vị thành niên ",
        self::threedottwo => "Số được  khám thai ≥4 lần/3 kỳ",
        self::threedotthree => "Số đẻ được XN viêm gan B khi mang thai",
        self::threedotfour => "Số đẻ được XN giang mai khi mang thai",
        self::threedotfive => "Số được XN HIV khi mang thai",
        self::threedotsix => "Số phụ nữ có thai có XN khẳng định + HIV trong gđ mang thai",
        self::threedotseven => "Số PN đẻ HIV (+) được điều trị ARV",
        self::threedoteight => "Số đẻ được XN đường huyết",
        self::threedotnine => "Số PN đẻ được can thiệp  FX/ GH",
        self::threedotten => "Số PN được mổ đẻ",
        self::four => "Số PN đẻ được CB có kỹ năng đỡ",
        self::five => "Số trẻ được cấp giấy chứng sinh",
        self::six => "CS sau sinh tại nhà",
        self::sixdotone => "Tuần đầu",
        self::sixdottwo => "Từ tuần 2 đến hết 6 tuần",
        self::seven => "Số ca tử vong mẹ được thẩm định"
    ];

    public static function getTitle($key)
    {
        return self::$title[$key] ?? null;
    }
}
