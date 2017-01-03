<?php
namespace Ohio\Spot\Address\Http\Requests;

use Ohio\Core\Base\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\Builder;

class PaginateAddresses extends PaginateRequest
{
    public $perPage = 10;

    public $orderBy = 'addresses.id';

    public $sortable = [
        'addresses.id',
        'addresses.url',
        'addresses.delta',
    ];

    public $searchable = [
        'addresses.url',
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