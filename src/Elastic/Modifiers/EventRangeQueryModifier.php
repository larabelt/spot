<?php

namespace Belt\Spot\Elastic\Modifiers;

use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Content\Elastic\Modifiers\PaginationQueryModifier;
use Belt\Core\Helpers;

class EventRangeQueryModifier extends PaginationQueryModifier
{
    /**
     * Modify the query
     *
     * @param  PaginateRequest $request
     * @return $query
     */
    public function modify(PaginateRequest $request)
    {

        $starts_at = $request->query->get('starts_at');
        $ends_at = $request->query->get('ends_at');

        $filter = [];

        if ($starts_at && !$ends_at) {
            $filter = [
                [
                    'range' => [
                        'starts_at' => [
                            'gte' => strtotime($starts_at),
                        ],
                    ],
                ],
            ];
        }

        if (!$starts_at && $ends_at) {
            $filter = [
                [
                    'range' => [
                        'ends_at' => [
                            'lte' => strtotime($ends_at),
                        ]
                    ],
                ],
            ];
        }

        if ($starts_at && $ends_at) {
            $filter = [
                // event.starts_at happens between posted date range
                [
                    'range' => [
                        'starts_at' => [
                            'gte' => strtotime($starts_at),
                            'lte' => strtotime($ends_at),
                        ],
                    ],
                ],
                // event.ends_at happens between posted date range
                [
                    'range' => [
                        'ends_at' => [
                            'gte' => strtotime($starts_at),
                            'lte' => strtotime($ends_at),
                        ]
                    ],
                ],
                // event has already started before posted starts_at
                // && event stops after posted ends_at. in other words, it is
                // happening the entire time during the posted date range
                [
                    'bool' => [
                        'must' => [
                            [
                                'range' => [
                                    'starts_at' => [
                                        'lte' => strtotime($starts_at),
                                    ],
                                ],
                            ],
                            [
                                'range' => [
                                    'ends_at' => [
                                        'gte' => strtotime($ends_at),
                                    ]
                                ],
                            ],
                        ],
                    ],
                ]
            ];
        }

        if ($filter) {
            $this->engine->filter[]['bool']['should'] = $filter;
        }

    }
}