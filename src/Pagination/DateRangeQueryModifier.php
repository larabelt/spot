<?php

namespace Belt\Spot\Pagination;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Pagination\PaginationQueryModifier;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class DateRangeQueryModifier extends PaginationQueryModifier
{
    /**
     * Modify the query
     *
     * @param  Builder $qb
     * @param  PaginateRequest $request
     * @return void
     */
    public function modify(Builder $qb, PaginateRequest $request)
    {
        $starts_at = $request->query->has('starts_at') ? $request->query->get('starts_at') : null;
        $ends_at = $request->query->has('ends_at') ? $request->query->get('ends_at') : null;

        if ($starts_at || $ends_at) {

            $starts_at = new Carbon(date('Y-m-d 00:00:00', strtotime($starts_at ?: 'now')));
            $ends_at = new Carbon(date('Y-m-d 23:59:59', strtotime($ends_at ?: '+1 year')));

            if ($ends_at->timestamp <= $starts_at->timestamp) {
                $ends_at = clone $starts_at;
                $ends_at->addYear();
            }
            $qb->where(function ($sub1) use ($starts_at, $ends_at) {
                // start date is inside full date window
                $sub1->orWhereBetween('starts_at', [$starts_at->format('Y-m-d 00:00:00'), $ends_at->format('Y-m-d 23:59:59')]);
                // end date is inside full date window
                $sub1->orWhereBetween('ends_at', [$starts_at->format('Y-m-d 00:00:00'), $ends_at->format('Y-m-d 23:59:59')]);
                // or full date window is after event.starts_at and before event.ends_at
                $sub1->orWhere(function ($sub2) use ($starts_at, $ends_at) {
                    $sub2->where('starts_at', '<=', $starts_at->format('Y-m-d 00:00:00'));
                    $sub2->where(function ($sub3) use ($starts_at, $ends_at) {
                        $sub3->whereNotNull('ends_at');
                        $sub3->where('ends_at', '>=', $ends_at->format('Y-m-d 23:59:59'));
                    });
                });
            });
        }

    }
}