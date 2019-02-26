<?php namespace Tests\Belt\Spot\Unit\Policies;

use Tests\Belt\Core;
use Belt\Spot\Policies\AmenityPolicy;

class AmenityPolicyTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

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