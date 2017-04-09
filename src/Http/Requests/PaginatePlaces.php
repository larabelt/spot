<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Glue\Http\Requests\PaginateCategorizables;
use Belt\Glue\Http\Requests\PaginateTaggables;
use Illuminate\Database\Eloquent\Builder;

class PaginatePlaces extends PaginateRequest
{
    public $perPlace = 10;

    public $orderBy = 'places.id';

    public $sortable = [
        'places.id',
        'places.name',
    ];

    public $searchable = [
        'places.name',
        'places.searchable',
    ];

    public function modifyQuery(Builder $query)
    {
        $query = PaginateCategorizables::scopeHasCategory($this, $query);
        $query = PaginateTaggables::scopeHasTag($this, $query);

        return $query;
    }

}