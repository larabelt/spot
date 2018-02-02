<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\ItineraryPolicy;

class ItineraryPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\ItineraryPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new ItineraryPolicy();

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}