<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\UpdateDeal;

class UpdateDealTest extends \PHPUnit\Framework\TestCase
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