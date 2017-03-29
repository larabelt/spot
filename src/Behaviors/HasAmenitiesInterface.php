<?php

namespace Belt\Spot\Behaviors;

interface HasAmenitiesInterface
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function amenities();

    /**
     * Remove amenity associations
     */
    public function purgeAmenities();

    /**
     * Return items associated with the given amenity
     *
     * @param $query
     * @param $amenity
     * @return mixed
     */
    public function scopeHasAmenity($query, $amenity);

}