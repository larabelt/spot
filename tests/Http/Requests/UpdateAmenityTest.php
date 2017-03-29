<?php

use Belt\Spot\Http\Requests\UpdateAmenity;

class UpdateAmenityTest extends \PHPUnit_Framework_TestCase
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