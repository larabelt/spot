<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\PlacePolicy;

class PlacePolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\PlacePolicy::index
     * @covers \Belt\Spot\Policies\PlacePolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new PlacePolicy();

        # index
        $this->assertTrue($policy->index($user, 1));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}