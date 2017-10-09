<?php

namespace Belt\Spot\Behaviors;

use DB;
use Belt\Spot\Amenity;

trait HasAmenities
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function amenities()
    {
        return $this->morphToMany(Amenity::class, 'owner', 'amenity_spots')->withPivot('value');
    }

    /**
     * Remove amenity associations
     */
    public function purgeAmenities()
    {
        DB::connection($this->getConnectionName())
            ->table('amenity_spots')
            ->where('owner_id', $this->id)
            ->where('owner_type', $this->getMorphClass())
            ->delete();
    }

    /**
     * Return items associated with the given amenity
     *
     * @param $query
     * @param $amenity
     * @return mixed
     */
    public function scopeHasAmenity($query, $amenity)
    {
        $query->whereHas('amenities', function ($query) use ($amenity) {
            $column = is_numeric($amenity) ? 'id' : 'slug';
            $query->where('amenities.' . $column, $amenity);
        });

        return $query;
    }

}