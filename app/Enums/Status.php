<?php


namespace App\Enums;


use MyCLabs\Enum\Enum;

class Status extends Enum
{
    const LOCK = 1;
    const UNLOCK = 0;

    private static $titles = [
        self::LOCK => '<strong class="text-danger">Đã khóa</strong>',
        self::UNLOCK => '<strong class="text-success">Đang mở khóa</strong>',
    ];

    public static function getTitle($lock)
    {
        if ($lock == self::UNLOCK){
            return self::$titles[self::UNLOCK];
        } else {
            return self::$titles[self::LOCK];
        }
    }
}
