<?php

use Ohio\Spot\Http\Requests\StorePlace;

class StorePlaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Http\Requests\StorePlace::rules
     */
    public function test()
    {

        $request = new StorePlace();

        $this->assertNotEmpty($request->rules());
    }

}