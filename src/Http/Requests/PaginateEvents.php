<?php

namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;

class PaginateEvents extends PaginateRequest
{
    public $perEvent = 10;

    public $orderBy = 'events.name';

    public $sortable = [
        'events.id',
        'events.name',
        'events.starts_at',
    ];

    public $searchable = [
        'events.name',
        'events.searchable',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\IsActiveQueryModifier::class,
        Belt\Glue\Pagination\CategorizableQueryModifier::class,
        Belt\Glue\Pagination\TaggableQueryModifier::class,
        Belt\Spot\Pagination\DateRangeQueryModifier::class,
    ];

}