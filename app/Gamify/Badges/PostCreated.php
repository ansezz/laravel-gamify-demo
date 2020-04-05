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
    public function beginner($badge, $subject)
    {
        return $subject->achieved_points >= 100;
    }

    /**
     * @param $badge
     * @param $subject
     *
     * @return bool
     */
    public function intermediate($badge, $subject)
    {
        return $subject->achieved_points >= 200;
    }

    /**
     * @param $badge
     * @param $subject
     *
     * @return bool
     */
    public function advanced($badge, $subject)
    {
        return $subject->achieved_points >= 300;
    }
}
