<?php namespace Tests\Belt\Spot\Unit\Policies;

use Belt\Core\Tests;
use Belt\Spot\Policies\AmenityPolicy;

class AmenityPolicyTest extends Tests\BeltTestCase
{

    use Tests\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\AmenityPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new AmenityPolicy();

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}