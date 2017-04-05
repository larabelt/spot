<?php

use Illuminate\Database\Seeder;

use Belt\Spot\Itinerary;

class BeltSpotItinerarySeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Itinerary::class, 5)->create();
    }
}
