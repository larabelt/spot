<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;

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
    ];

}