<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Address;
use Belt\Spot\Event;

class EventTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Event::setIsSearchableAttribute
     * @covers \Belt\Spot\Event::toSearchableArray
     */
    public function test()
    {
        $event = factory(Event::class)->make();
        $event->address = factory(Address::class)->make();

        # is searchable
        $event->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $event->is_searchable);

        # toSearchableArray
        $this->assertNotEmpty($event->toSearchableArray());

    }

}