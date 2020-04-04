<?php

namespace App\Gamify\Badges;

use Ansezz\Gamify\BaseBadge;

class PostCreated extends BaseBadge
{

    /**
     * @param $badge
     * @param $subject
     *
     * @return bool
     */
    public function firstLevel($badge, $subject)
    {
        return $subject->point_sum >= 100;
    }

    /**
     * @param $badge
     * @param $subject
     *
     * @return bool
     */
    public function secondLevel($badge, $subject)
    {
        return $subject->point_sum >= 200;
    }
}
