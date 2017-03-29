<?php

use Illuminate\Database\Seeder;

use Belt\Spot\Amenity;

class BeltSpotAmenitySeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Amenity::class, 25)->create();
    }
}
