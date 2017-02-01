<?php

use Ohio\Core\Testing;
use Ohio\Spot\Policies\PlacePolicy;

class PlacePolicyTest extends Testing\OhioTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Ohio\Spot\Policies\PlacePolicy::index
     * @covers \Ohio\Spot\Policies\PlacePolicy::view
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