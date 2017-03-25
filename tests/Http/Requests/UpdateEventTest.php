<?php

use Belt\Spot\Http\Requests\UpdateEvent;

class UpdateEventTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdateEvent::rules
     */
    public function test()
    {

        $request = new UpdateEvent();

        $this->assertNotEmpty($request->rules());
    }

}