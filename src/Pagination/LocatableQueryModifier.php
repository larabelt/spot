<?php

namespace Belt\Spot\Pagination;

use Belt, DB;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Core\Pagination\PaginationQueryModifier;
use Illuminate\Database\Eloquent\Builder;

class LocatableQueryModifier extends PaginationQueryModifier
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
            $this->joinLocationTable($qb, $request);
            $qb->where('locations.lat', '<=', $nlat);
        }

        if ($slat = $request->get('slat')) {
            $this->joinLocationTable($qb, $request);
            $qb->where('locations.lat', '>=', $slat);
        }

        if ($wlng = $request->get('wlng')) {
            $this->joinLocationTable($qb, $request);
            $qb->where('locations.lng', '<=', $wlng);
        }

        if ($elng = $request->get('elng')) {
            $this->joinLocationTable($qb, $request);
            $qb->where('locations.lng', '>=', $elng);
        }

        $lat = $request->get('lat');
        $lng = $request->get('lng');
        if ($lat && $lng) {
            $this->joinLocationTable($qb, $request);
            $qb->select([
                    //'places.id',
                    $request->morphClass() . '.id',
                    DB::raw("( 3959 * acos ( cos ( radians( $lat ) ) 
                    * cos( radians( locations.lat ) ) 
                    * cos( radians( locations.lng ) - radians( $lng ) ) 
                    + sin ( radians( $lat ) ) 
                    * sin( radians( locations.lat ) ) ) ) 
                    as distance")
                ]
            );
            $qb->orderBy('distance');
            if ($radius = $request->get('radius')) {
                $qb->havingRaw('distance < ?', [$radius]);
            }
        }

    }

    public function joinLocationTable(Builder $qb, PaginateRequest $request)
    {
        $request->joins['locations'] = function ($qb, $request) {
            $qb->join('locations', function ($sub) use ($request) {
                $sub->on('locations.locatable_id', '=', $request->fullKey());
                $sub->where('locations.locatable_type', $request->morphClass());
            });
        };
    }
}