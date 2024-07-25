<?php

namespace app;

class SummerDiscountStrategy implements DiscountStrategy
{
    public function priceByDiscount($type, $season)
    {
        if ($season == 'spring') {
            return 0.6;
        } elseif ($season == 'summer') {
            return 0.5;
        } elseif ($season == 'winter') {
            return 0.7;
        } else {
            return 1;
        }
    }
}
