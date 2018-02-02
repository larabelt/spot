<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\EventPolicy;

class EventPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\EventPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new EventPolicy();

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}