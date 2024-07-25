<?php

namespace trip;

class VipTripMethod implements TripMethod
{
    private static $matrix;

    public static function setMatrix($var_matrix)
    {
        self::$matrix = $var_matrix;
    }

    public function calcPrice(TripParam $param)
    {
        $base_cost = 10;
        if ($param->is_rainy && $param->is_peak) {
            $ratio = 3;
        } elseif (!$param->is_rainy && $param->is_peak) {
            $ratio = 2;
        } elseif (!$param->is_rainy && !$param->is_peak) {
            $ratio = 2;
        } else {
            $ratio = 1;
        }
        $cost = $base_cost * self::$matrix[$param->start][$param->end];
        return $cost * $ratio;
    }
}
