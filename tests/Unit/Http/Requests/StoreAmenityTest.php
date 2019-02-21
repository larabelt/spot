<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\StoreAmenity;

class StoreAmenityTest extends \PHPUnit\Framework\TestCase
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