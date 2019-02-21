<?php namespace Tests\Belt\Spot\Unit\Policies;

use Belt\Core\Tests;
use Belt\Spot\Policies\EventPolicy;

class EventPolicyTest extends Tests\BeltTestCase
{

    use Tests\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\EventPolicy::view
     * @covers \Belt\Spot\Policies\EventPolicy::create
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new EventPolicy();

        # create
        $this->assertNotTrue($policy->create($user));
        $this->assertNotEmpty($policy->create($this->getUser('team')));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}