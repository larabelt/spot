<?php

use Belt\Core\Testing;
use Belt\Spot\Policies\DealPolicy;

class DealPolicyTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\DealPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new DealPolicy();

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}