<?php

use Belt\Spot\Location;
use Illuminate\Database\Seeder;

class BeltSpotLocationSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Location::class, 25)->create();
    }
}
