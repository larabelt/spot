<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\PlacePolicy;

class PlacePolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\PlacePolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new PlacePolicy();

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}