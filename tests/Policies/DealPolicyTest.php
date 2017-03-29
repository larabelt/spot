<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\DealPolicy;

class DealPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\DealPolicy::index
     * @covers \Belt\Spot\Policies\DealPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new DealPolicy();

        # index
        $this->assertTrue($policy->index($user, 1));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}