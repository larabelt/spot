<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\EventPolicy;

class EventPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\EventPolicy::index
     * @covers \Belt\Spot\Policies\EventPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new EventPolicy();

        # index
        $this->assertTrue($policy->index($user, 1));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}