<?php

namespace Belt\Spot\Resources\Params;

use Belt;

/**
 * Class BaseEvent
 * @package Belt\Core\Resources\Params
 */
class BaseEvent extends Belt\Core\Resources\BaseParam
{
    protected $type = 'events';
    protected $label = 'Event';
    protected $description = 'Link existing event to this item.';
}