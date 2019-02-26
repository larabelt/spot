<?php namespace Tests\Belt\Spot\Unit\Pagination;

use Mockery as m;
use Tests\Belt\Core;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Spot\Pagination\DateRangeQueryModifier;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class DateRangeQueryModifierTest extends \Tests\Belt\Core\BeltTestCase
{

    use \Tests\Belt\Core\Base\CommonMocks;

    private $default_ends_at;

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Pagination\DateRangeQueryModifier::modify
     */
    public function test()
    {
        $this->default_ends_at = date('Y-m-d 23:59:59', strtotime('+1 year'));

        $qb = m::mock(Builder::class);
        $qb->shouldReceive('where')->with(
            m::on(function (\Closure $closure) {
                $sub1 = m::mock(Builder::class);
                $sub1->shouldReceive('orWhereBetween')->with('starts_at', ['2001-10-01 00:00:00', '2002-10-01 23:59:59']);
                $sub1->shouldReceive('orWhereBetween')->with('ends_at', ['2001-10-01 00:00:00', '2002-10-01 23:59:59']);
                $sub1->shouldReceive('orWhere')->with(
                    m::on(function (\Closure $closure) {
                        $sub2 = m::mock(Builder::class);
                        $sub2->shouldReceive('where')->with('starts_at', '<=', '2001-10-01 00:00:00');
                        $sub2->shouldReceive('where')->with(
                            m::on(function (\Closure $closure) {
                                $sub3 = m::mock(Builder::class);
                                $sub3->shouldReceive('whereNotNull')->with('ends_at');
                                $sub3->shouldReceive('where')->with('ends_at', '>=', '2002-10-01 23:59:59');
                                $closure($sub3);
                                return is_callable($closure);
                            })
                        );
                        $closure($sub2);
                        return is_callable($closure);
                    })
                );
                $closure($sub1);
                return is_callable($closure);
            })
        );

        $request = new PaginateRequest([
            'starts_at' => '2001-10-01',
            'ends_at' => '2001-09-01',
        ]);

        $modifier = new DateRangeQueryModifier($qb, $request);
        $modifier->modify($qb, $request);
    }

}