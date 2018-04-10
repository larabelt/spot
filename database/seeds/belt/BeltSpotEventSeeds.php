<?php

use Belt\Spot\Event;
use Illuminate\Database\Seeder;

class BeltSpotEventSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, 25)->create();
    }
}
