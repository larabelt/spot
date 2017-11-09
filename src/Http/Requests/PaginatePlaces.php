<?php

namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginatePlaces extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Place::class;

    public $perPage = 10;

    public $orderBy = 'places.name';

    public $sortable = [
        'places.id',
        'places.name',
        'places.rating',
        'places.priority',
    ];

    public $searchable = [
        'places.name',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
        Belt\Core\Pagination\IsActiveQueryModifier::class,
        Belt\Core\Pagination\PriorityQueryModifier::class,
        Belt\Core\Pagination\TeamableQueryModifier::class,
        Belt\Glue\Pagination\CategorizableQueryModifier::class,
        Belt\Glue\Pagination\TaggableQueryModifier::class,
        Belt\Spot\Pagination\AddressableQueryModifier::class,
    ];

}