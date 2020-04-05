<?php

namespace App\Gamify\Points;

use Ansezz\Gamify\BasePoint;

class PostCreated extends BasePoint
{

    public function __invoke($point, $subject)
    {
        return true;
    }

    /**
     * @param null $subject
     *
     * @return float|int
     */
    public function getDynamicPoints($point, $subject = null)
    {
        return 10 * 20;
    }

}
