<?php

use Belt\Spot\Http\Requests\StoreItinerary;

class StoreItineraryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreItinerary::rules
     */
    public function test()
    {

        $request = new StoreItinerary();

        $this->assertNotEmpty($request->rules());
    }

}