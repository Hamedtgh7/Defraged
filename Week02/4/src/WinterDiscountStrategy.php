<?php

namespace app;

class WinterDiscountStrategy implements DiscountStrategy
{
    public function priceByDiscount($type, $season)
    {
        if ($season == 'fall') {
            $season_discount = 0.6;
        } elseif ($season == 'summer') {
            $season_discount = 0.75;
        } elseif ($season == 'winter') {
            $season_discount = 0.5;
        } else {
            $season_discount = 1;
        }

        if ($type == 'Jacket') {
            $season_discount = $season_discount - $season_discount * 0.1;
        }
        return $season_discount;
    }
}
