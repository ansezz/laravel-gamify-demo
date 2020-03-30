<?php

namespace App\Gamify\Points;

use Ansezz\Gamify\BasePoint;

class MyPoint extends BasePoint
{

    public function __invoke($badge, $subject)
    {
        return $subject->point_sum >= 100;
    }

}
