<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\UpdateLocation;

class UpdateLocationTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdateLocation::rules
     */
    public function test()
    {

        $request = new UpdateLocation();

        $this->assertTrue(is_array($request->rules()));
    }

}