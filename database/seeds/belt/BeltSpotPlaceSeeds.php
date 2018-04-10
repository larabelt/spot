<?php

use Belt\Spot\Place;
use Illuminate\Database\Seeder;

class BeltSpotPlaceSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Place::class, 25)->create();
    }
}
