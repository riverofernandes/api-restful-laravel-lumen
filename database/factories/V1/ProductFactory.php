<?php

namespace Database\Factories\V1;

use App\Models\V1\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'price'     => $this->faker->numberBetween(1, 20),
            'image'     => $this->faker->imageUrl(200, 200)
        ];
    }
}
