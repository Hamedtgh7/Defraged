<?php

namespace trip;


class TripParam
{
    public $start;
    public $end;
    public $is_peak;
    public $is_rainy;

    public function __construct($start, $end, $is_peak, $is_rainy)
    {
        $this->start = $start;
        $this->end = $end;
        $this->is_peak = $is_peak;
        $this->is_rainy = $is_rainy;
    }
}
