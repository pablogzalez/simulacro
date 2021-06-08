<?php

namespace Database\Seeders;

use App\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::factory()->create(['name' => 'Chuli']);
        Shop::factory()->create(['name' => 'Infotec']);
        Shop::factory()->create(['name' => 'Holi']);
        Shop::factory()->create(['name' => 'Baserock']);
    }
}
