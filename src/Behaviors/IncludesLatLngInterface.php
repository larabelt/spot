<?php
namespace Ohio\Spot\Behaviors;

interface IncludesLatLngInterface
{

    public function setLatAttribute($value);

    public function setNorthLatAttribute($value);

    public function setSouthLatAttribute($value);

    public function setLngAttribute($value);

    public function setEastLngAttribute($value);

    public function setWestLngAttribute($value);

}