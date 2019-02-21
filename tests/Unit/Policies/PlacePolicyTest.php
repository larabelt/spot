<?php namespace Tests\Belt\Spot\Unit\Policies;

use Belt\Core\Tests;
use Belt\Spot\Policies\PlacePolicy;

class PlacePolicyTest extends Tests\BeltTestCase
{

    use Tests\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\PlacePolicy::view
     * @covers \Belt\Spot\Policies\PlacePolicy::create
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new PlacePolicy();

        # create
        $this->assertNotTrue($policy->create($user));
        $this->assertNotEmpty($policy->create($this->getUser('team')));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}