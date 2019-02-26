<?php namespace Tests\Belt\Spot\Unit;
use Mockery as m;

use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Deal;
use Illuminate\Database\Eloquent\Builder;

class DealTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Deal::setIsSearchableAttribute
     */
    public function test()
    {
        $deal = factory(Deal::class)->make();

        # is searchable
        $deal->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $deal->is_searchable);

    }

}