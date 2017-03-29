<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;

class PaginateDeals extends PaginateRequest
{
    public $perDeal = 10;

    public $orderBy = 'deals.id';

    public $sortable = [
        'deals.id',
        'deals.name',
    ];

    public $searchable = [
        'deals.name',
    ];

}