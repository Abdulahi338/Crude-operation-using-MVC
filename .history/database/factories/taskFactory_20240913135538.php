<?php

namespace Database\Factories;
use App\Models\Task;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class taskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tile'=>fake()->text,
            'description'=>fake()->paragraph,

        ];
    }
}
