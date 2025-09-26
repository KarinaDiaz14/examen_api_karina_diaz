<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

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
            'user_id' => rand(1, 10),
            'company_id' => rand(1, 3),
            'name' => fake()->bs(),
            'description' => fake()->sentence(10),
            'is_completed' => rand(0, 1),
            'start_at' => now(),
            'expired_at' =>now()->addMinute(),
        ];
    }
}
