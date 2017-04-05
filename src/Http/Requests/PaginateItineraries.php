<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;

class PaginateItineraries extends PaginateRequest
{
    public $perItinerary = 10;

    public $orderBy = 'itineraries.id';

    public $sortable = [
        'itineraries.id',
        'itineraries.name',
    ];

    public $searchable = [
        'itineraries.name',
    ];

}