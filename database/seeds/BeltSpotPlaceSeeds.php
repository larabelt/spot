<?php

use Illuminate\Database\Seeder;

use Belt\Spot\Place;

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
