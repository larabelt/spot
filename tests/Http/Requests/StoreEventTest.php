<?php

use Belt\Spot\Http\Requests\StoreEvent;

class StoreEventTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreEvent::rules
     */
    public function test()
    {

        $request = new StoreEvent();

        $this->assertNotEmpty($request->rules());
    }

}