<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\PaginateRequest;

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
    ];

}