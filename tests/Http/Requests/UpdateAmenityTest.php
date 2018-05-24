<?php

use Belt\Spot\Http\Requests\UpdateAmenity;

class UpdateAmenityTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdateAmenity::rules
     */
    public function test()
    {

        $request = new UpdateAmenity();

        $this->assertNotEmpty($request->rules());
    }

}