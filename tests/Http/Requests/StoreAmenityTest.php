<?php

use Belt\Spot\Http\Requests\StoreAmenity;

class StoreAmenityTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreAmenity::rules
     */
    public function test()
    {

        $request = new StoreAmenity();

        $this->assertNotEmpty($request->rules());
    }

}