<?php

namespace Belt\Spot\Resources\Params;

use Belt;

/**
 * Class BasePlace
 * @package Belt\Core\Resources\Params
 */
class BasePlace extends Belt\Core\Resources\BaseParam
{
    protected $type = 'places';
    protected $label = 'Place';
    protected $description = 'Link existing place to this item.';
}