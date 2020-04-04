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


        $gamify_level1 = GamifyLevel::create([
            'name' => 'First level',
        ]);

        $gamify_level2 = GamifyLevel::create([
            'name' => 'Second level',
        ]);

        $badge1 = factory(Badge::class)->create([
            'name'            => 'Post Created Level 1',
            'gamify_group_id' => $group_badge->id,
            'gamify_level_id' => $gamify_level1->id,
            'class'           => PostCreated::class,
        ]);


        $badge2 = factory(Badge::class)->create([
            'name'            => 'Post Created level 2',
            'gamify_group_id' => $group_badge->id,
            'gamify_level_id' => $gamify_level2->id,
            'class'           => PostCreated::class,
        ]);


        // Create points
        $group_point = factory(GamifyGroup::class)->create([
            'type' => 'point',
        ]);

        $points = factory(Point::class, 2)->create([
            'gamify_group_id' => $group_point->id,
            'point'           => 100,
        ]);


        $user->achievePoint($points->first());
        $user->achievePoint($points->last());

        // $user->achieveBadge($badges->first());
        // $user->achieveBadge($badges->last());

        // $user->undoBadge($badges->first());
        // $user->undoPoint($points->first());


        $this->assertEquals(200, $user->point_sum);
        $this->assertCount(2, $user->badges);
        // Send Event

        // check if user has is level Archived

    }
}
