<?php

namespace Belt\Spot\Elastic\Modifiers;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Content\Elastic\Modifiers\PaginationQueryModifier;
use Belt\Core\Helpers;

class RatingSortModifier extends PaginationQueryModifier
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
            if ($sort = $sortHelper->getByColumn('rating')) {
                $this->engine->sort['rating'] = [
                    'unmapped_type' => 'float',
                    'order' => $sort->dir,
                ];
            }
        }

    }
}