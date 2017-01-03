<?php

use Ohio\Spot\Address\Http\Requests\StoreAddress;

class StoreAddressTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Address\Http\Requests\StoreAddress::rules
     */
    public function test()
    {

        $request = new StoreAddress();

        $this->assertNotEmpty($request->rules());
    }

}