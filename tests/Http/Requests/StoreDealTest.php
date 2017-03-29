<?php

use Belt\Spot\Http\Requests\StoreDeal;

class StoreDealTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreDeal::rules
     */
    public function test()
    {

        $request = new StoreDeal();

        $this->assertNotEmpty($request->rules());
    }

}