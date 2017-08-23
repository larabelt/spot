<?php

return [
    'extends' => 'belt-spot::places.web.show',
    'path' => 'belt-spot::places.templates.default',
    'can_create_params' => false,
    'params' => [
        'trip_advisor_id' => '',
        'class' => [
            'col-md-3' => 'default',
            'col-md-12' => 'wide',
        ],
        'icon' => [
            '' => 'default',
            'fa-star' => 'featured',
        ]
    ]
];