<?php

namespace app;

class ImplementionBikeProvider implements BikeProvider
{
    private int $id = 1;

    public function provide()
    {
        $bike = new Bike($this->id, (string)$this->id, $this->id * 100, true);
        $this->id += 1;
        return $bike;
    }

    public function repair($bike)
    {
        $bike->set_is_healthy(true);
    }
}
