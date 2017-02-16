<?php

use Belt\Spot\Http\Requests\UpdatePlace;

class UpdatePlaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdatePlace::rules
     */
    public function test()
    {

        $request = new UpdatePlace();

        $this->assertNotEmpty($request->rules());
    }

}