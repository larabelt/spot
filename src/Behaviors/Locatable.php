<?php
namespace Belt\Spot\Behaviors;

use Belt\Spot\Location;

trait Locatable
{

    public function location()
    {
        return $this->morphOne(Location::class, 'locatable')->orderBy('delta');
    }

    public function locations()
    {
        return $this->morphMany(Location::class, 'locatable')->orderBy('delta');
    }

}