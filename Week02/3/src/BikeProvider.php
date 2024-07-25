<?php

namespace app;

interface BikeProvider
{
    public function provide();
    public function repair($bike);
}
