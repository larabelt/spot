<?php

return [
    'extends' => 'belt-spot::events.web.show',
    'path' => 'belt-spot::events.templates.default',
    'builder' => \App\Builders\DefaultBuilder::class,
    'can_create_params' => false,
    'params' => [
        'show_datetime' => [
            'true' => 'Yes',
            'false' => 'No',
        ],
    ]
];