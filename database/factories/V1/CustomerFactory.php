<?php

namespace Database\Factories\V1;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'email'         => $this->faker->unique()->safeEmail,
            'phone'         => $this->faker->phoneNumber(),
            'birth'         => $this->faker->date(),
            'address'       => $this->faker->andress(),
            'complement'    => $this->faker->secondaryAddress(),
            'district'      => $this->faker->country(),
            'zip'           => $this->faker->postcode(),
        ];
    }
}
