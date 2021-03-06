<?php

namespace Belt\Spot\Elastic\Modifiers;

use Carbon\Carbon;
use Belt\Core\Http\Requests\PaginateRequest;
use Belt\Elastic\Modifiers\PaginationQueryModifier;
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

        $starts_at = $starts_at ? new Carbon(date('Y-m-d 00:00:00', strtotime($starts_at))) : null;
        $ends_at = $ends_at ? new Carbon(date('Y-m-d 23:59:59', strtotime($ends_at))) : null;

        $filter = [];

        if ($starts_at && !$ends_at) {
            $filter = [
                // event starts or ends after starts_at date
                [
                    'bool' => [
                        'should' => [
                            [
                                'range' => [
                                    'starts_at' => [
                                        'gte' => strtotime($starts_at),
                                    ],
                                ],
                            ],
                            [
                                'range' => [
                                    'ends_at' => [
                                        'gte' => strtotime($starts_at),
                                    ]
                                ],
                            ],
                        ],
                    ],
                ]
            ];
        }

        if (!$starts_at && $ends_at) {
            $filter = [
                // event starts or ends before ends_at date
                [
                    'bool' => [
                        'should' => [
                            [
                                'range' => [
                                    'starts_at' => [
                                        'lte' => strtotime($ends_at),
                                    ],
                                ],
                            ],
                            [
                                'range' => [
                                    'ends_at' => [
                                        'lte' => strtotime($ends_at),
                                    ]
                                ],
                            ],
                        ],
                    ],
                ]
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