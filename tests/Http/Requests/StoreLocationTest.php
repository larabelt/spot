<?php

use Belt\Spot\Http\Requests\StoreLocation;

class StoreLocationTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreLocation::rules
     */
    public function test()
    {

        $request = new StoreLocation();

        $this->assertNotEmpty($request->rules());
    }

}