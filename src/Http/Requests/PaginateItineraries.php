<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Glue\Http\Requests\PaginateCategorizables;
use Belt\Glue\Http\Requests\PaginateTaggables;
use Illuminate\Database\Eloquent\Builder;

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
        'itineraries.searchable',
    ];

    public function modifyQuery(Builder $query)
    {
        $query = PaginateCategorizables::scopeHasCategory($this, $query);
        $query = PaginateTaggables::scopeHasTag($this, $query);

        return $query;
    }

}