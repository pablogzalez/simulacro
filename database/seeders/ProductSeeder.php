<?php

namespace Database\Seeders;

use App\Category;
use App\Product;
use App\Shop;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetchRelations();

        foreach (range(1, 20) as $i) {
            $this->createRandomProduct();
        }
    }

    public function fetchRelations()
    {
        $this->categories = Category::all();
        $this->shops = Shop::all();
    }

    public function createRandomProduct()
    {
        $product = Product::factory()->create();

        $product->categories()->attach($this->categories->random(rand(0, 4)));

        $product->shops()->attach($this->shops->random(rand(0, 4)));

    }
}
