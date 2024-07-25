<?php

namespace app;

class BikeStore
{
    private ImplementionBikeProvider $provider;
    private Clock $clock;
    private int $expireTime;
    private array $store_bikes = [];
    private array $borrowed = [];

    public function __construct(ImplementionBikeProvider $provider, Clock $clock, int $expireTime)
    {
        $this->provider = $provider;
        $this->clock = $clock;
        $this->expireTime = $expireTime;
    }

    public function borrow(): Bike
    {
        foreach ($this->store_bikes as $index => $bike) {
            if ($bike->is_healthy()) {
                array_splice($this->store_bikes, $index, 1);
                $this->borrowed[] = ['bike' => $bike, 'time' => $this->clock->getCurrentTime()];
                return $bike;
            } else {
                $this->provider->repair($bike);
            }
        }

        foreach ($this->borrowed as $index => $bike) {
            $return_time = $this->clock->returnTime($bike['time'], $this->expireTime);
            if ($return_time <= $this->clock->getCurrentTime()) {
                array_splice($this->borrowed, $index, 1);
                $this->borrowed[] = ['bike' => $bike, 'time' => $this->clock->getCurrentTime()];
                return $bike;
            }
        }

        $bike = $this->provider->provide();
        $this->borrowed[] = ['bike' => $bike, 'time' => $this->clock->getCurrentTime()];
        return $bike;
    }

    public function restore(Bike $bike, bool $needsRepair)
    {
        foreach ($this->borrowed as $index => $borrowed_bike) {
            if ($bike->get_id() == $borrowed_bike['bike']->get_id()) {
                array_splice($this->borrowed, $index, 1);
                if ($needsRepair) {
                    $bike->set_is_healthy(false);
                }
                $this->store_bikes[] = $borrowed_bike;
                return;
            }
        }
        throw new Exception('This bike does not belong here.');
    }

    public function borrowedCount(): int
    {
        return count($this->borrowed);
    }
}
