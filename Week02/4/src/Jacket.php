<?php

namespace app;

class Jacket extends Clothing
{
    public function __construct($name, $season, $basePrice)
    {
        parent::__construct($name, $season, $basePrice);
    }
}
