<?php

use Mockery as m;
use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Behaviors\HasAmenities;
use Belt\Spot\Amenity;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class HasAmenitiesTest extends BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Behaviors\HasAmenities::amenities
     * @covers \Belt\Spot\Behaviors\HasAmenities::purgeAmenities
     * @covers \Belt\Spot\Behaviors\HasAmenities::scopeHasAmenity
     */
    public function test()
    {
        # amenities
        $morphMany = m::mock(Relation::class);
        $morphMany->shouldReceive('orderby')->withArgs(['delta']);
        $pageMock = m::mock(HasAmenitiesTestStub::class . '[morphMany]');
        $pageMock->shouldReceive('morphMany')->withArgs([Amenity::class, 'hasAmenities'])->andReturn($morphMany);
        $pageMock->shouldReceive('amenities');
        $pageMock->amenities();


        # scopeHasAmenity
        $hasAmenities = new HasAmenitiesTestStub();
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('whereHas')->twice()->with('amenities',
            m::on(function (\Closure $closure) {
                $qbMock = m::mock(Builder::class);
                $qbMock->shouldReceive('where')->with('amenities.id', 1);
                $qbMock->shouldReceive('where')->with('amenities.slug', 'test');
                $closure($qbMock);
                return is_callable($closure);
            })
        );
        $hasAmenities->scopeHasAmenity($qbMock, 1);
        $hasAmenities->scopeHasAmenity($qbMock, 'test');

        # purgeAmenities
        $hasAmenities->id = 1;
        DB::shouldReceive('connection')->once()->andReturnSelf();
        DB::shouldReceive('table')->once()->with('amenity_spots')->andReturnSelf();
        DB::shouldReceive('where')->once()->with('owner_id', 1)->andReturnSelf();
        DB::shouldReceive('where')->once()->with('owner_type', 'hasAmenitiesTestStub')->andReturnSelf();
        DB::shouldReceive('delete')->once()->andReturnSelf();
        $hasAmenities->purgeAmenities();
    }

}

class HasAmenitiesTestStub extends Model
{
    use HasAmenities;

    public function getMorphClass()
    {
        return 'hasAmenitiesTestStub';
    }
}