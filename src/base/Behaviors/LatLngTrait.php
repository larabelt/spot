<?php
namespace Ohio\Spot\Base\Behaviors;

trait LatLngTrait
{

    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = trim($value);
    }

    public function setNorthLatAttribute($value)
    {
        $this->attributes['north_lat'] = trim($value);
    }

    public function setSouthLatAttribute($value)
    {
        $this->attributes['south_lat'] = trim($value);
    }

    public function setLngAttribute($value)
    {
        $this->attributes['lng'] = trim($value);
    }

    public function setEastLngAttribute($value)
    {
        $this->attributes['east_lng'] = trim($value);
    }

    public function setWestLngAttribute($value)
    {
        $this->attributes['west_lng'] = trim($value);
    }

}