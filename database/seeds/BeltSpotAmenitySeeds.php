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
        factory(Amenity::class, 10)
            ->create()
            ->each(function ($c1) {
                factory(Amenity::class, random_int(3, 5))
                    ->create(['parent_id' => $c1->id])
                    ->each(function ($c2) {
                        $count = random_int(0, 3);
                        if ($count) {
                            factory(Amenity::class, random_int(3, 5))
                                ->create([
                                    'parent_id' => $c2->id,
                                    'template' => random_int(1, 10) > 5 ? 'text' : 'textarea',
                                ]);
                        }
                    });
            });
    }
}
