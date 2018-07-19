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
        factory(Amenity::class, 1)->create(['subtype' => 'boolean']);
        factory(Amenity::class, 1)->create(['subtype' => 'text']);
        factory(Amenity::class, 1)->create(['subtype' => 'textarea']);

        factory(Amenity::class, 3)
            ->create(['subtype' => 'group'])
            ->each(function ($c1) {
                $templates = ['boolean', 'text', 'textarea'];
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'subtype' => $templates[array_rand($templates)]]);
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'subtype' => $templates[array_rand($templates)]]);
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'subtype' => $templates[array_rand($templates)]]);
            });

        factory(Amenity::class, 3)
            ->create(['subtype' => 'group'])
            ->each(function ($c1) {
                factory(Amenity::class, random_int(3, 5))
                    ->create(['subtype' => 'group', 'parent_id' => $c1->id])
                    ->each(function ($c2) {
                        $templates = ['boolean', 'text', 'textarea'];
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'subtype' => $templates[array_rand($templates)]]);
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'subtype' => $templates[array_rand($templates)]]);
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'subtype' => $templates[array_rand($templates)]]);
                    });
            });
    }
}
