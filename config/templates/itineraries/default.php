<?php

return [
    'extends' => 'belt-spot::itineraries.web.show',
    'path' => 'belt-spot::itineraries.templates.default',
    'params' => [
        'class' => [
            'col-md-3' => 'default',
            'col-md-12' => 'wide',
        ],
        'icon' => [
            'default' => 'default',
            'edit' => 'edit',
            'create' => 'create',
        ]
    ]
];