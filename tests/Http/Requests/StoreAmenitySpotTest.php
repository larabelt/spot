<?php

use Belt\Spot\Http\Requests\StoreAmenitySpot;

class StoreAmenitySpotTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreAmenitySpot::rules
     */
    public function test()
    {

        $request = new StoreAmenitySpot();

        $this->assertNotEmpty($request->rules());
    }

}