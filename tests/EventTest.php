<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Event;
use Illuminate\Database\Eloquent\Builder;

class EventTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Event::setIsSearchableAttribute
     */
    public function test()
    {
        $event = factory(Event::class)->make();

        # is searchable
        $event->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $event->is_searchable);

    }

}