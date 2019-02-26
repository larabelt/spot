<?php namespace Tests\Belt\Spot\Unit\Resources\Subtypes;

use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Resources\Subtypes\BaseEvent;

class SubtypesBaseEventTest extends BeltTestCase
{

    /**
     * @covers \Belt\Spot\Resources\Subtypes\BaseEvent::toArray
     */
    public function test()
    {
        $subtype = new BaseEvent();
        $subtype->setLabel('foo');
        $this->assertEquals('foo', array_get($subtype->toArray(), 'label'));
    }

}