<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Spot\Amenity;
use Illuminate\Database\Eloquent\Builder;
use Belt\Core\Http\Requests\PaginateRequest;

/**
 * Class PaginateAmenitySpots
 * @package Belt\Spot\Http\Requests
 */
class PaginateAmenitySpots extends PaginateRequest
{

    /**
     * @var int
     */
    public $perPage = 100;

    /**
     * @var string
     */
    public $orderBy = 'amenity_spots.id';

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [];

    /**
     * @var Amenity
     */
    public $amenities;

    /**
     * @return Amenity
     */
    public function amenities()
    {
        return $this->amenities ?: $this->amenities = new Amenity();
    }

    /**
     * @inheritdoc
     */
    public function modifyQuery(Builder $query)
    {
        # show amenities associated with owner
        if (!$this->get('not')) {
            $query->amenitied($this->get('owner_type'), $this->get('owner_id'));
        }

        # show amenities not associated with owner
        if ($this->get('not')) {
            $query->notAmenitied($this->get('owner_type'), $this->get('owner_id'));
        }

        return $query;
    }

    /**
     * @inheritdoc
     */
    public function items(Builder $query)
    {
        return $query->get();
    }

}