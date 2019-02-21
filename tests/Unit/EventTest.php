<?php namespace Tests\Belt\Spot\Unit;
use Mockery as m;

use Belt\Core\Tests\BeltTestCase;
use Belt\Spot\Location;
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
        $event->location = factory(Location::class)->make();

        # is searchable
        $event->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $event->is_searchable);

        # toSearchableArray
        $this->assertNotEmpty($event->toSearchableArray());

    }

}