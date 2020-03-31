<?php

namespace App\Gamify\Points;

use Ansezz\Gamify\BasePoint;

class TestPoint extends BasePoint
{

    public function __invoke($badge, $subject)
    {
        return true;
    }

}
