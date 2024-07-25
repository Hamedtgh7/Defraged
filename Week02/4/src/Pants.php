<?php

namespace app;

class Pants extends Clothing
{
    public function __construct($name, $season, $basePrice)
    {
        parent::__construct($name, $season, $basePrice);
    }
}
