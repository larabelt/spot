<?php

namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;

class PaginateEvents extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Event::class;

    public $perEvent = 10;

    public $orderBy = 'events.name';

    public $sortable = [
        'events.id',
        'events.name',
        'events.starts_at',
        'events.ends_at',
    ];

    public $searchable = [
        'events.name',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
        Belt\Core\Pagination\IsActiveQueryModifier::class,
        Belt\Glue\Pagination\CategorizableQueryModifier::class,
        Belt\Glue\Pagination\TaggableQueryModifier::class,
        Belt\Spot\Pagination\DateRangeQueryModifier::class,
    ];

}