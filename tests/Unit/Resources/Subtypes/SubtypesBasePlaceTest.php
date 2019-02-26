<?php namespace Tests\Belt\Spot\Unit\Resources\Subtypes;

use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Resources\Subtypes\BasePlace;

class SubtypesBasePlaceTest extends BeltTestCase
{

    /**
     * @covers \Belt\Spot\Resources\Subtypes\BasePlace::toArray
     */
    public function test()
    {
        $subtype = new BasePlace();
        $subtype->setLabel('foo');
        $this->assertEquals('foo', array_get($subtype->toArray(), 'label'));
    }

}