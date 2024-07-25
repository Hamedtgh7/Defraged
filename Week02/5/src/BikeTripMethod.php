<?php

namespace trip;


class BikeTripMethod implements TripMethod
{
    private static $matrix;

    public static function setMatrix($var_matrix)
    {
        self::$matrix = $var_matrix;
    }

    public function calcPrice(TripParam $param)
    {
        $base_cost = 4;
        if ($param->is_rainy && $param->is_peak) {
            $ratio = 1.5;
        } elseif (!$param->is_rainy && $param->is_peak) {
            $ratio = 2;
        } elseif (!$param->is_rainy && !$param->is_peak) {
            $ratio = 0.8;
        } else {
            $ratio = 1;
        }
        $cost = $base_cost * self::$matrix[$param->start][$param->end];
        return $cost * $ratio;
    }
}
