<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title'=> fake()->title(),
            'description'=>fake()->text(),
            'from'=> fake()->randomDigit(),
            'to' =>fake()->randomDigit(),
           'image'=> fake()->imageUrl(800,600),
        ];
    }
}
