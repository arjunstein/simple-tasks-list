<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Section - ' . $this->faker->sentence(1),
            'description' => $this->faker->paragraph,
            'long_description' => $this->faker->paragraph(2, true),
            'completed' => 0,
        ];
    }
}
