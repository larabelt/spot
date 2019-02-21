<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\UpdateEvent;

class UpdateEventTest extends \PHPUnit\Framework\TestCase
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