<?php

use Belt\Spot\Http\Requests\AttachAmenity;

class AttachAmenityTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\AttachAmenity::rules
     */
    public function test()
    {

        $request = new AttachAmenity();

        $this->assertNotEmpty($request->rules());
    }

}