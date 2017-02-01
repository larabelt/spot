<?php
namespace Ohio\Spot\Http\Requests;

use Ohio\Core\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginateAddresses extends PaginateRequest
{
    public $perPage = 10;

    public $orderBy = 'addresses.id';

    public $sortable = [
        'addresses.id',
        'addresses.name',
        'addresses.locality',
        'addresses.region',
        'addresses.postcode',
        'addresses.country',
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

    public function modifyQuery(Builder $query)
    {
        if ($this->get('delta')) {
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