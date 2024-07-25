<?php

namespace app;

class YaldaDiscountStrategy implements DiscountStrategy
{
    public function priceByDiscount($type, $season)
    {
        if ($type == 'Jacket') {
            return 0.9;
        } elseif ($type == 'Socks') {
            return 0.8;
        } else {
            return 0.75;
        }
    }
}
