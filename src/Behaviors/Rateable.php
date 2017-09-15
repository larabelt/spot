<?php

namespace Belt\Spot\Behaviors;

trait Rateable
{

    /**
     * @param $value
     */
    public function setRatingAttribute($value)
    {
        $this->attributes['rating'] = $value ? number_format($value, 2) : null;
    }

}