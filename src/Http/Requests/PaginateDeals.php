<?php
namespace Belt\Spot\Http\Requests;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Glue\Http\Requests\PaginateCategorizables;
use Belt\Glue\Http\Requests\PaginateTaggables;
use Illuminate\Database\Eloquent\Builder;

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

    public function modifyQuery(Builder $query)
    {
        $query = PaginateCategorizables::scopeHasCategory($this, $query);
        $query = PaginateTaggables::scopeHasTag($this, $query);

        if ($is_active = $this->get('is_active')) {
            $query->where('is_active', $is_active);
        }

        return $query;
    }

}