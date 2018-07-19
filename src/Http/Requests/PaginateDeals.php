<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;

class PaginateDeals extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Deal::class;

    public $perDeal = 10;

    public $orderBy = 'deals.id';

    public $sortable = [
        'deals.id',
        'deals.name',
        'deals.rating',
        'deals.created_at',
        'deals.updated_at',
    ];

    public $searchable = [
        'deals.name',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
        Belt\Core\Pagination\IsActiveQueryModifier::class,
        Belt\Core\Pagination\PriorityQueryModifier::class,
        Belt\Core\Pagination\TeamableQueryModifier::class,
        Belt\Content\Pagination\SubtypeQueryModifier::class,
        Belt\Content\Pagination\TermableQueryModifier::class,
    ];

}