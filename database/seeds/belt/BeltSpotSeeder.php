<?php

use Illuminate\Database\Seeder;

class BeltSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BeltSpotLocationSeeds::class);
        $this->call(BeltSpotAmenitySeeds::class);
        $this->call(BeltSpotDealSeeds::class);
        $this->call(BeltSpotEventSeeds::class);
        $this->call(BeltSpotPlaceSeeds::class);
        $this->call(BeltSpotPermissbleSeeds::class);
    }
}
