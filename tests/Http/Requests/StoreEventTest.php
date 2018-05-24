<?php

use Belt\Spot\Http\Requests\StoreEvent;

class StoreEventTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreEvent::rules
     */
    public function test()
    {

        $request = new StoreEvent();
        $this->assertNotEmpty($request->rules());

        $request = new StoreEvent(['source' => 1]);
        $this->assertArrayHasKey('source', $request->rules());
    }

}