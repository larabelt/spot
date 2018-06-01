<?php

namespace Belt\Spot\Elastic\Modifiers;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Elastic\Modifiers\PaginationQueryModifier;
use Belt\Core\Helpers;

class EventDateSortModifier extends PaginationQueryModifier
{
    /**
     * Modify the query
     *
     * @param  PaginateRequest $request
     * @return $query
     */
    public function modify(PaginateRequest $request)
    {

        if ($orderBy = $request->get('orderBy')) {
            $sortHelper = new Helpers\SortHelper($orderBy);
            if ($sort = $sortHelper->getByColumn('starts_at')) {
                $this->engine->sort['starts_at'] = [
                    'unmapped_type' => 'float',
                    'order' => $sort->dir,
                ];
            }
            if ($sort = $sortHelper->getByColumn('ends_at')) {
                $this->engine->sort['ends_at'] = [
                    'unmapped_type' => 'float',
                    'order' => $sort->dir,
                ];
            }
        }

    }
}