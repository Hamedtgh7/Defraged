<?php

namespace trip;

interface TripMethod
{
    public function calcPrice(TripParam $param);
    public static function setMatrix($var_matrix);
}
