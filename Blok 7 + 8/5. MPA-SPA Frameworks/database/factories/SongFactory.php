<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genreId' => $this->faker->numberBetween(1, 15),
            'name' => $this->faker->word(),
            'artist' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(90, 300)
        ];
    }
}
