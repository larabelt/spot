<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\AmenityPolicy;

class AmenityPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\AmenityPolicy::index
     * @covers \Belt\Spot\Policies\AmenityPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new AmenityPolicy();

        # index
        $this->assertTrue($policy->index($user, 1));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}