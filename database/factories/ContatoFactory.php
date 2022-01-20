<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'sexo' => $this->faker->randomElement(['M','F','NB', '']),
        ];
    }
}
