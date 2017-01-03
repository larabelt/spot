<?php
namespace Ohio\Spot\Base\Behaviors;

use Ohio\Spot\Place\Place;

trait PlacegableTrait
{

    public function places()
    {
        return $this->morphToMany(Place::class, 'placegable');
    }

}