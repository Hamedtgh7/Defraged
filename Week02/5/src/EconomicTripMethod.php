<?php

namespace trip;

class EconomicTripMethod implements TripMethod
{
    private static $matrix;

    public static function setMatrix($var_matrix)
    {
        self::$matrix = $var_matrix;
    }

    public function calcPrice(TripParam $param)
    {
        $base_cost = 5;
        if ($param->is_rainy && $param->is_peak) {
            $ratio = 1.4;
        } elseif (!$param->is_rainy && $param->is_peak) {
            $ratio = 1.2;
        } elseif (!$param->is_rainy && !$param->is_peak) {
            $ratio = 1.2;
        } else {
            $ratio = 1;
        }
        $cost = $base_cost * self::$matrix[$param->start][$param->end];
        return $cost * $ratio;
    }
}
