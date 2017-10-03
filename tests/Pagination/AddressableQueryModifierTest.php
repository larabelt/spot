<?php

use Mockery as m;
use Belt\Core\Testing;
use Belt\Spot\Http\Requests\PaginatePlaces;
use Belt\Spot\Pagination\AddressableQueryModifier;
use Illuminate\Database\Eloquent\Builder;

class AddressableQueryModifierTest extends Testing\BeltTestCase
{

    use Testing\CommonMocks;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Pagination\AddressableQueryModifier::modify
     * @covers \Belt\Spot\Pagination\AddressableQueryModifier::joinAddressTable
     */
    public function test()
    {
        # modify (nlat)
        $qb = m::mock(Builder::class);
        $qb->shouldReceive('where')->once()->with('addresses.lat', '<=', 100);
        $qb->shouldReceive('join')->once()->with('addresses',
            m::on(function (\Closure $closure) {
                $subQBMock = m::mock(Builder::class);
                $subQBMock->shouldReceive('on')->once()->with('addresses.addressable_id', '=', 'places.id');
                $subQBMock->shouldReceive('where')->once()->with('addresses.addressable_type', 'places');
                $closure($subQBMock);
                return is_callable($closure);
            })
        );

        $request = new PaginatePlaces(['nlat' => 100]);
        $modifer = new AddressableQueryModifier($qb, $request);
        $modifer->modify($qb, $request);
        foreach ($request->joins as $join) {
            $join($qb, $request);
        }

        # modify (slat)
        $qb = m::mock(Builder::class);
        $qb->shouldReceive('where')->once()->with('addresses.lat', '>=', 100);
        $request = new PaginatePlaces(['slat' => 100]);
        $modifer = new AddressableQueryModifier($qb, $request);
        $modifer->modify($qb, $request);

        # modify (wlng)
        $qb = m::mock(Builder::class);
        $qb->shouldReceive('where')->once()->with('addresses.lng', '<=', 100);
        $request = new PaginatePlaces(['wlng' => 100]);
        $modifer = new AddressableQueryModifier($qb, $request);
        $modifer->modify($qb, $request);

        # modify (elng)
        $qb = m::mock(Builder::class);
        $qb->shouldReceive('where')->once()->with('addresses.lng', '>=', 100);
        $request = new PaginatePlaces(['elng' => 100]);
        $modifer = new AddressableQueryModifier($qb, $request);
        $modifer->modify($qb, $request);

        # modify (lat & lng)
        $qb = m::mock(Builder::class);
        $qb->shouldReceive('select')->once();
        $qb->shouldReceive('orderBy')->once()->with('distance');
        $qb->shouldReceive('havingRaw')->once();
        $request = new PaginatePlaces(['lat' => 100, 'lng' => 100, 'radius' => 10]);
        $modifer = new AddressableQueryModifier($qb, $request);
        $modifer->modify($qb, $request);

    }

}