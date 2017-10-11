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
        factory(Amenity::class, 1)->create(['template' => 'boolean']);
        factory(Amenity::class, 1)->create(['template' => 'text']);
        factory(Amenity::class, 1)->create(['template' => 'textarea']);

        factory(Amenity::class, 3)
            ->create(['template' => 'group'])
            ->each(function ($c1) {
                $templates = ['boolean', 'text', 'textarea'];
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'template' => $templates[array_rand($templates)]]);
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'template' => $templates[array_rand($templates)]]);
                factory(Amenity::class)->create(['parent_id' => $c1->id, 'template' => $templates[array_rand($templates)]]);
            });

        factory(Amenity::class, 3)
            ->create(['template' => 'group'])
            ->each(function ($c1) {
                factory(Amenity::class, random_int(3, 5))
                    ->create(['template' => 'group', 'parent_id' => $c1->id])
                    ->each(function ($c2) {
                        $templates = ['boolean', 'text', 'textarea'];
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'template' => $templates[array_rand($templates)]]);
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'template' => $templates[array_rand($templates)]]);
                        factory(Amenity::class)->create(['parent_id' => $c2->id, 'template' => $templates[array_rand($templates)]]);
                    });
            });
    }
}
