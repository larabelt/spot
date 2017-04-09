<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Glue\Http\Requests\PaginateCategorizables;
use Belt\Glue\Http\Requests\PaginateTaggables;
use Illuminate\Database\Eloquent\Builder;

class PaginateEvents extends PaginateRequest
{
    public $perEvent = 10;

    public $orderBy = 'events.id';

    public $sortable = [
        'events.id',
        'events.name',
    ];

    public $searchable = [
        'events.name',
        'events.searchable',
    ];

    public function modifyQuery(Builder $query)
    {
        $query = PaginateCategorizables::scopeHasCategory($this, $query);
        $query = PaginateTaggables::scopeHasTag($this, $query);

        return $query;
    }

}