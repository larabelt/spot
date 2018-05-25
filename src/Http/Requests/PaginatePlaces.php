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
        'places.created_at',
        'places.updated_at',
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
        Belt\Content\Pagination\TermableQueryModifier::class,
        Belt\Spot\Pagination\AddressableQueryModifier::class,
    ];

}