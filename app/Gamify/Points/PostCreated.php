<?php

namespace App\Gamify\Points;

use Ansezz\Gamify\BasePoint;

class PostCreated extends BasePoint
{

    /**
     * check if user achieve the point
     * @param $point
     * @param $subject
     *
     * @return bool
     */
    public function __invoke($point, $subject)
    {
        return true;
    }

    /**
     * @param $point
     * @param null $subject
     *
     * @return float|int
     */
    public function getDynamicPoints($point, $subject = null)
    {
        return 10 * 20;
    }

}
