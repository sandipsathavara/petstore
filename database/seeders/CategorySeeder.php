<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();

        #-- Adding products for every category
        $categories->each(function ($category) {
            $category->products()->saveMany(
                Product::factory(20)->make()
            );
        });
    }
}
