<?php

namespace Belt\Spot\Pagination;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Pagination\PaginationQueryModifier;
use Illuminate\Database\Eloquent\Builder;

class AddressableQueryModifier extends PaginationQueryModifier
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

        if ($nlat = $request->get('nlat')) {
            $this->joinAddressTable($qb, $request);
            $qb->where('addresses.lat', '<=', $nlat);
        }

        if ($slat = $request->get('slat')) {
            $this->joinAddressTable($qb, $request);
            $qb->where('addresses.lat', '>=', $slat);
        }

        if ($wlng = $request->get('wlng')) {
            $this->joinAddressTable($qb, $request);
            $qb->where('addresses.lng', '<=', $wlng);
        }

        if ($elng = $request->get('elng')) {
            $this->joinAddressTable($qb, $request);
            $qb->where('addresses.lng', '>=', $elng);
        }

    }

    public function joinAddressTable(Builder $qb, PaginateRequest $request)
    {
        $request->joins['addresses'] = function ($qb, $request) {
            $qb->join('addresses', function ($sub) use ($request) {
                $sub->on('addresses.addressable_id', '=', $request->fullKey());
                $sub->where('addresses.addressable_type', $request->morphClass());
            });
        };
    }
}