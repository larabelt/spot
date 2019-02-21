<?php namespace Tests\Belt\Spot\Unit\Http\Requests;

use Belt\Spot\Http\Requests\UpdatePlace;

class UpdatePlaceTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\UpdatePlace::rules
     */
    public function test()
    {

        $request = new UpdatePlace();

        $this->assertNotEmpty($request->rules());
    }

}