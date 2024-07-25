<?php


namespace app;


class Socks extends Clothing
{
    public function __construct($name, $season, $basePrice)
    {
        parent::__construct($name, $season, $basePrice);
    }
}
