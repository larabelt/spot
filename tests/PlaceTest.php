<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Place;
use Illuminate\Database\Eloquent\Builder;

class PlaceTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Place::setIsSearchableAttribute
     */
    public function test()
    {
        $place = factory(Place::class)->make();

        # is searchable
        $place->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $place->is_searchable);

    }

}