<?php
namespace Belt\Spot\Behaviors;

trait IncludesLatLng
{

    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = trim(floatval($value));
    }

    public function setNorthLatAttribute($value)
    {
        $this->attributes['north_lat'] = trim(floatval($value));
    }

    public function setSouthLatAttribute($value)
    {
        $this->attributes['south_lat'] = trim(floatval($value));
    }

    public function setLngAttribute($value)
    {
        $this->attributes['lng'] = trim(floatval($value));
    }

    public function setEastLngAttribute($value)
    {
        $this->attributes['east_lng'] = trim(floatval($value));
    }

    public function setWestLngAttribute($value)
    {
        $this->attributes['west_lng'] = trim(floatval($value));
    }

}