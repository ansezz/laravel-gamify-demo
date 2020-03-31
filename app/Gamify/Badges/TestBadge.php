<?php

namespace App\Gamify\Badges;

use Ansezz\Gamify\BaseBadge;

class TestBadge extends BaseBadge
{

    public function __invoke($badge, $subject)
    {
        return $subject->point_sum >= 100;
    }

}
