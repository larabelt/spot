<?php

use Ohio\Spot\Place\Http\Requests\UpdatePlace;

class UpdatePlaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Place\Http\Requests\UpdatePlace::rules
     */
    public function test()
    {

        $request = new UpdatePlace();

        $this->assertNotEmpty($request->rules());
    }

}