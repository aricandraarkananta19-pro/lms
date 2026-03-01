<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'course_id' => \App\Models\Course::inRandomOrder()->first()->id ?? \App\Models\Course::factory(),
            'title' => 'Kuis: ' . $title,
            'slug' => \Illuminate\Support\Str::slug('Kuis: ' . $title) . '-' . uniqid(),
            'description' => fake()->paragraphs(2, true),
            'time_limit' => fake()->randomElement([15, 30, 45, 60, 90, null]),
        ];
    }
}
