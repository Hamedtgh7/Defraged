<?php

namespace app;

class Shirt extends Clothing
{
    public function __construct($name, $season, $basePrice)
    {
        parent::__construct($name, $season, $basePrice);
    }
}
