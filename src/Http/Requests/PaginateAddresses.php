<?php
namespace Belt\Spot\Http\Requests;

use Belt;
use Belt\Core\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginateAddresses extends PaginateRequest
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $modelClass = Belt\Spot\Address::class;

    public $perPage = 10;

    public $orderBy = 'addresses.id';

    public $sortable = [
        'addresses.id',
        'addresses.name',
        'addresses.locality',
        'addresses.region',
        'addresses.postcode',
        'addresses.country',
        'addresses.created_at',
        'addresses.updated_at',
    ];

    public $searchable = [
        'addresses.name',
        'addresses.line1',
        'addresses.line2',
        'addresses.line3',
        'addresses.line4',
        'addresses.locality',
        'addresses.region',
        'addresses.postcode',
        'addresses.country',
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

        if ($this->get('addressable_id')) {
            $query->where('addressable_id', $this->get('addressable_id'));
        }

        if ($this->get('addressable_type')) {
            $query->where('addressable_type', $this->get('addressable_type'));
        }

        return $query;
    }

}