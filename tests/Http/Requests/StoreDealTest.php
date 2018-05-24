<?php

use Belt\Spot\Http\Requests\StoreDeal;

class StoreDealTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @covers \Belt\Spot\Http\Requests\StoreDeal::rules
     */
    public function test()
    {

        $request = new StoreDeal();
        $this->assertNotEmpty($request->rules());

        $request = new StoreDeal(['source' => 1]);
        $this->assertArrayHasKey('source', $request->rules());
    }

}