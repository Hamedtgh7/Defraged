<?php

namespace app;

class Clothing
{
    protected $name;
    protected $season;
    protected $basePrice;
    protected ?DiscountStrategy $discountType = null;

    public function __construct($name, $season, $basePrice)
    {
        $this->name = $name;
        $this->season = $season;
        $this->basePrice = $basePrice;
    }

    public function discountStrategy($discountType)
    {
        $this->discountType = $discountType;
    }

    public function getPrice()
    {
        if ($this->discountType != null) {
            $type = (new \ReflectionClass($this))->getShortName();
            $discount = $this->discountType->priceByDiscount($type, $this->season);
            return $discount * $this->basePrice;
        } else {
            return $this->basePrice;
        }
    }
}
