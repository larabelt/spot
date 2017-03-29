<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;

/**
 * Class PaginateAmenities
 * @package Belt\Spot\Http\Requests
 */
class PaginateAmenities extends PaginateRequest
{
    /**
     * @var int
     */
    public $perPage = 10;

    /**
     * @var string
     */
    public $orderBy = 'amenities.name';

    /**
     * @var array
     */
    public $sortable = [
        'amenities.id',
        'amenities.name',
    ];

    /**
     * @var array
     */
    public $searchable = [
        'amenities.name',
    ];

}