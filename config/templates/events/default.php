<?php

return [
    'extends' => 'belt-spot::events.web.show',
    'path' => 'belt-spot::events.templates.default',
    'builder' => \App\Builders\DefaultBuilder::class,
    'params' => [
        'show_datetime' => [
            'true' => 'Yes',
            'false' => 'No',
        ],
    ]
];