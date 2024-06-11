<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stage>
 */
class StageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(), // Assuming you have a Student factory
            'company_name' => $this->faker->company,
            'start_date' => $this->faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+1 year', '+2 years')->format('Y-m-d'),
            'grade' => $this->faker->randomFloat(0, 0, 20), // Random float between 0 and 4 with 2 decimal places
            'notes' => $this->faker->sentence,
        ];
    }
}
