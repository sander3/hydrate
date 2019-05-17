<?php

use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Venue::class, 3)->create()->each(function ($venue) {
            $category = factory(App\Category::class)->make();

            $venue->categories()->save($category);

            $category->products()->saveMany(
                factory(App\Product::class, 5)->make()
            );
        });
    }
}
