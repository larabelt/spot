<?php

namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginatePlaces extends PaginateRequest
{
    public $perPage = 10;

    public $orderBy = 'places.name';

    public $sortable = [
        'places.id',
        'places.name',
    ];

    public $searchable = [
        'places.name',
        //'places.searchable',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\IsActiveQueryModifier::class,
        Belt\Core\Pagination\TeamableQueryModifier::class,
        Belt\Glue\Pagination\CategorizableQueryModifier::class,
        Belt\Glue\Pagination\TaggableQueryModifier::class,
    ];

}