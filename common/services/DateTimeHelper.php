<?php

namespace common\services;

use DateTime;
use yii\log\SyslogTarget;

class DateTimeHelper
{
    public static function timeToStr(int $time, string $format = "Y-m-d"): ?string
    {
        if (!empty($time)) {
            return date($format, $time);
        }
        return null;
    }


    public static function strToTime(string $strTime): ?int
    {
        return strtotime($strTime);
    }
}