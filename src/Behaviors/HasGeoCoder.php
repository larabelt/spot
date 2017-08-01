<?php

namespace Belt\Spot\Behaviors;

use Belt\Spot\Services\GeoCoders;

trait HasGeoCoder
{

    /**
     * @var GeoCoders\BaseGeoCoder
     */
    public $geocoder;

    /**
     * @return GeoCoders\BaseGeoCoder
     */
    public function geocoder()
    {
        return $this->geocoder ?: (new GeoCoders\GeoCoderFactory())->up();
    }

    /**
     * @param $str
     * @return GeoCoders\BaseGeoCoder
     */
    public function geocode($str)
    {
        $this->geocoder()->geocode($str);

        return $this->geocoder();
    }

}