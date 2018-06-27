<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginateLocations extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Location::class;

    public $perPage = 10;

    public $orderBy = 'locations.id';

    public $sortable = [
        'locations.id',
        'locations.name',
        'locations.locality',
        'locations.region',
        'locations.postcode',
        'locations.country',
        'locations.created_at',
        'locations.updated_at',
    ];

    public $searchable = [
        'locations.name',
        'locations.line1',
        'locations.line2',
        'locations.line3',
        'locations.line4',
        'locations.locality',
        'locations.region',
        'locations.postcode',
        'locations.country',
    ];

    /**
     * @var Belt\Core\Pagination\PaginationQueryModifier[]
     */
    public $queryModifiers = [
        Belt\Core\Pagination\InQueryModifier::class,
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function modifyQuery(Builder $query)
    {
        if ($type = $this->get('delta')) {
            $query->where('delta', $this->get('delta'));
        }

        if ($this->get('locatable_id')) {
            $query->where('locatable_id', $this->get('locatable_id'));
        }

        if ($this->get('locatable_type')) {
            $query->where('locatable_type', $this->get('locatable_type'));
        }

        return $query;
    }

}