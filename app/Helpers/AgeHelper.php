<?php

namespace App\Helpers;

use Carbon;

class AgeHelper
{
    /**
     * forms correct description of age
     *
     * @param $n
     * @return string
     */
    public static function age($n)
    {
        $n = explode('-', $n)[0];
        $n = Carbon::create($n)->diffInYears(Carbon::now());
        $d = $n % 10;
        if ($d == 1 and $n != 11)
        {
            return "$n год";
        }
        elseif ($d > 1 and $d < 5 and $n > 20)
        {
            return "$n года";
        }
        else
        {
            return "$n лет";
        }
    }

    public static function birthdate($date, $time = false)
    {
        if ($time) {
            $date = explode(' ', $date)[0];
        }
        list($year, $month, $day) = explode('-', $date);
        switch ((int)$month) {
            case 1: $month = "января"; break;
            case 2: $month = "февраля"; break;
            case 3: $month = "марта"; break;
            case 4: $month = "апреля"; break;
            case 5: $month = "мая"; break;
            case 6: $month = "июня"; break;
            case 7: $month = "июля"; break;
            case 8: $month = "августа"; break;
            case 9: $month = "сентября"; break;
            case 10: $month = "октября"; break;
            case 11: $month = "ноября"; break;
            case 12: $month = "декабря"; break;
        }
        $date = (int)$day . " " . $month . " " . $year . " г";
        return $date;
    }
}