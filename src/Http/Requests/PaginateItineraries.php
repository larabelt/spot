<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;

class PaginateItineraries extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Itinerary::class;

    public $perItinerary = 10;

    public $orderBy = 'itineraries.id';

    public $sortable = [
        'itineraries.id',
        'itineraries.name',
        'itineraries.rating',
    ];

    public $searchable = [
        'itineraries.name',
        //'itineraries.searchable',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
        Belt\Core\Pagination\PriorityQueryModifier::class,
        Belt\Glue\Pagination\CategorizableQueryModifier::class,
        Belt\Glue\Pagination\TaggableQueryModifier::class,
    ];

}