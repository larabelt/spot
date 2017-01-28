<?php

use Ohio\Spot\Http\Requests\UpdateAddress;

class UpdateAddressTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Ohio\Spot\Http\Requests\UpdateAddress::rules
     */
    public function test()
    {

        $request = new UpdateAddress();

        $this->assertTrue(is_array($request->rules()));
    }

}