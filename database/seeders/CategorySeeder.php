<?php

namespace Database\Seeders;

use App\Category;
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
        Category::factory()->create(['name' => 'Muebles']);
        Category::factory()->create(['name' => 'Videojuegos']);
        Category::factory()->create(['name' => 'Electrodomesticos']);
        Category::factory()->create(['name' => 'Informatica']);
    }
}
