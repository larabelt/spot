<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\EventPolicy;

class EventPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

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