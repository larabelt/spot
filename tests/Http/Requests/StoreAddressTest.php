<?php

use Ohio\Spot\Http\Requests\StoreAddress;

class StoreAddressTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Http\Requests\StoreAddress::rules
     */
    public function test()
    {

        $request = new StoreAddress();

        $this->assertNotEmpty($request->rules());
    }

}