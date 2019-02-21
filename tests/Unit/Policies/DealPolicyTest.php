<?php namespace Tests\Belt\Spot\Unit\Policies;

use Belt\Core\Tests;
use Belt\Spot\Policies\DealPolicy;

class DealPolicyTest extends Tests\BeltTestCase
{

    use Tests\CommonMocks;

    /**
     * @covers \Belt\Spot\Policies\DealPolicy::create
     * @covers \Belt\Spot\Policies\DealPolicy::view
     */
    public function test()
    {
        $user = $this->getUser();

        $policy = new DealPolicy();

        # create
        $this->assertNotTrue($policy->create($user));
        $this->assertNotEmpty($policy->create($this->getUser('team')));

        # view
        $this->assertTrue($policy->view($user, 1));
    }

}