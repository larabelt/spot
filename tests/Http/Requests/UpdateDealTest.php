<?php

use Belt\Spot\Http\Requests\UpdateDeal;

class UpdateDealTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdateDeal::rules
     */
    public function test()
    {

        $request = new UpdateDeal();

        $this->assertNotEmpty($request->rules());
    }

}