<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameCat = [
            'Burek',
            'Szary',
            'Białas',
            'Reksio',
            'Misia',
            'Kicia',
            'Brudas',
            'Murek',
            'Ostry',
            'Max',
            'Puszek',
            'Skoczek',
            'Wronek',
            'Mila',
            'Piła',
            'Kłos',
            'Bury',
        ];

        return [
            'name' => fake()->randomElement($nameCat),
            'age' => fake()->numberBetween(1,25),
        ];
    }
}
