<?php

use Ohio\Spot\Place\Http\Requests\StorePlace;

class StorePlaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Place\Http\Requests\StorePlace::rules
     */
    public function test()
    {

        $request = new StorePlace();

        $this->assertNotEmpty($request->rules());
    }

}