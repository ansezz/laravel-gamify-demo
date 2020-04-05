<?php

namespace Tests\Feature;

use Ansezz\Gamify\Badge;
use Ansezz\Gamify\GamifyGroup;
use Ansezz\Gamify\GamifyLevel;
use Ansezz\Gamify\Point;
use App\Gamify\Badges\FirstBadge;
use App\Gamify\Badges\MyBadge;
use App\Gamify\Badges\PostCreated;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GamifyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Create user
        /** @var User $user */
        $user = factory(User::class)->create();

        // Create Badge
        $group_badge = factory(GamifyGroup::class)->create([
            'type' => 'badge',
        ]);


        $badge1 = factory(Badge::class)->create([
            'name'            => 'Post Created beginner',
            'gamify_group_id' => $group_badge->id,
            'level'           => config('gamify.badge_levels.beginner'),
            'class'           => PostCreated::class,
        ]);


        $badge2 = factory(Badge::class)->create([
            'name'            => 'Post Created intermediate',
            'gamify_group_id' => $group_badge->id,
            'level'           => config('gamify.badge_levels.intermediate'),
            'class'           => PostCreated::class,
        ]);

        $badge2 = factory(Badge::class)->create([
            'name'            => 'Post Created advanced',
            'gamify_group_id' => $group_badge->id,
            'level'           => config('gamify.badge_levels.advanced'),
            'class'           => PostCreated::class,
        ]);


        // Create points
        $group_point = factory(GamifyGroup::class)->create([
            'type' => 'point',
        ]);

        $point1 = factory(Point::class)->create([
            'gamify_group_id' => $group_point->id,
            'point'           => 100,
        ]);

        $point2 = factory(Point::class)->create([
            'gamify_group_id' => $group_point->id,
            'point'           => 0,
            'class'           => \App\Gamify\Points\PostCreated::class,
        ]);


        $user->achievePoint($point1);
        $user->achievePoint($point2);


        $this->assertEquals(300, $user->achieved_points);
        $this->assertCount(3, $user->badges);

        $user->undoPoint($point1);
        // Refresh data
        $user->refresh();

        $this->assertEquals(200, $user->achieved_points);
        $this->assertCount(2, $user->badges);

    }
}
