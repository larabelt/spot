<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\StoreAmenitySpot;

class StoreAmenitySpotTest extends \PHPUnit\Framework\TestCase
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