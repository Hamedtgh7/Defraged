<?php

namespace app;

class Bike
{
    private int $id;
    private string $name;
    private int $price;
    private bool $is_healthy;

    public function __construct($id, $name, $price, $is_healthy)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->is_healthy = $is_healthy;
    }

    public function get_is_healthy()
    {
        return $this->is_healthy;
    }

    public function set_is_healthy($is_healthy)
    {
        $this->is_healthy = $is_healthy;
    }

    public function get_id()
    {
        return $this->id;
    }
}
