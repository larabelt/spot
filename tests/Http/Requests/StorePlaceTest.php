<?php

use Belt\Spot\Http\Requests\StorePlace;

class StorePlaceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StorePlace::rules
     */
    public function test()
    {

        $request = new StorePlace();
        $this->assertNotEmpty($request->rules());

        $request = new StorePlace(['source' => 1]);
        $this->assertArrayHasKey('source', $request->rules());
    }

}