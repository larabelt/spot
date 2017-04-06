<?php

namespace Belt\Spot\Http\Requests;

use Belt\Spot\Itinerary;
use Illuminate\Database\Eloquent\Builder;
use Belt\Core\Http\Requests\PaginateRequest;

/**
 * Class PaginateItineraryPlaces
 * @package Belt\Place\Http\Requests
 */
class PaginateItineraryPlaces extends PaginateRequest
{
    /**
     * @var int
     */
    public $perPage = 100;

    /**
     * @var string
     */
    public $orderBy = 'itinerary_place.position';

    /**
     * @inheritdoc
     */
    public function modifyQuery(Builder $query)
    {

        if ($itinerary_id = $this->request->get('itinerary_id')) {
            $query->where('itinerary_id', $itinerary_id);
        }

//        $query->select(['places.*', 'itinerary_place.*']);
//        //$query->groupBy('places.id');
//
//        # show itineraries associated with owner
//        if (!$this->get('not')) {
//            $query->join('itinerary_place', 'itinerary_place.place_id', '=', 'places.id');
//            $query->where('itinerary_place.itinerary_id', $this->get('itinerary_id'));
//            $query->orderBy('itinerary_place.position');
//        }
//
//        # show itineraries not associated with owner
//        if ($this->get('not')) {
//            //$query->where('itinerary_place.itinerary_id', '!=', $this->get('itinerary_id'));
//            $query->leftJoin('itinerary_place', function ($query) {
//                $query->on('itinerary_place.place_id', '=', 'places.id');
//                $query->where('itinerary_place.itinerary_id', $this->get('itinerary_id'));
//            });
//            $query->whereNull('itinerary_place.id');
//        }

        return $query;
    }

}