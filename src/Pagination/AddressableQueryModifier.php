<?php

namespace Belt\Spot\Pagination;

use Belt, DB;
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

        $lat = $request->get('lat');
        $lng = $request->get('lng');
        if ($lat && $lng) {
            $this->joinAddressTable($qb, $request);
            $qb->select([
                    'places.id',
                    DB::raw("( 3959 * acos ( cos ( radians( $lat ) ) 
                    * cos( radians( addresses.lat ) ) 
                    * cos( radians( addresses.lng ) - radians( $lng ) ) 
                    + sin ( radians( $lat ) ) 
                    * sin( radians( addresses.lat ) ) ) ) 
                    as distance")
                ]
            );
            $qb->orderBy('distance');
            if ($radius = $request->get('radius')) {
                $qb->havingRaw('distance < ?', [$radius]);
            }
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