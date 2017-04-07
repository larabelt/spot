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
        if ($itinerary_id = $this->get('itinerary_id')) {
            $query->where('itinerary_id', $itinerary_id);
        }

        return $query;
    }

}