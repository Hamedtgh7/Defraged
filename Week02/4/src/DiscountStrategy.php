<?php

namespace app;

interface DiscountStrategy
{
    public function priceByDiscount($type, $season);
}
