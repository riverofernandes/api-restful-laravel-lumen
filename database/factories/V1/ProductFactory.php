<?php

namespace Database\Factories\V1;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'price'     => $this->faker->numberBetween(1, 20),
            'imagem'    => $this->faker->imageUrl(200, 200)
        ];
    }
}
