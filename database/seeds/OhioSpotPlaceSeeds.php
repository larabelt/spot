<?php

use Illuminate\Database\Seeder;

use Ohio\Spot\Place\Place;

class OhioSpotPlaceSeeds extends Seeder
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
