<?php

namespace app;

class Clock
{
    public function getCurrentTime()
    {
        return time();
    }

    public function returnTime($borrow_time, $exipre_time)
    {
        return $borrow_time + $exipre_time;
    }

    public function returnDay($time)
    {
        return date('Y-m-d', $time);
    }

    public function returnHour($time)
    {
        return date('H-i-s', $time);
    }
}
