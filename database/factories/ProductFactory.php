<?php

namespace Database\Factories;

use App\Model;
use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->uuid,
            'price' => $this->faker->numberBetween(1,100000),
            'expiration_date' => $this->faker->date(),
            'shipment' => $this->faker->boolean,
            'stock' => $this->faker->boolean,
        ];
    }
}
