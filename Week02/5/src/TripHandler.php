<?php

namespace trip;

class TripHandler
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function calcPrice($type, $params)
    {
        if ($type == 'bike') {
            $method = new BikeTripMethod;
        } elseif ($type == 'economic') {
            $method = new EconomicTripMethod;
        } elseif ($type == 'vip') {
            $method = new VipTripMethod;
        } else {
            throw new CustomExeption('The method is not valid.');
        }
        $method->setMatrix($params['matrix']);

        return $method->calcPrice($params['params']);
    }
}
