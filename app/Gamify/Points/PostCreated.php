<?php

namespace App\Gamify\Points;

use Ansezz\Gamify\BasePoint;

class PostCreated extends BasePoint
{

    public function __invoke($badge, $subject)
    {
        return true;
    }

}
