<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;

/**
 * Class PaginateAmenities
 * @package Belt\Spot\Http\Requests
 */
class PaginateAmenities extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Amenity::class;

    /**
     * @var int
     */
    public $perPage = 999;

    /**
     * @var string
     */
    public $orderBy = 'amenities._lft';

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

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
    ];

}