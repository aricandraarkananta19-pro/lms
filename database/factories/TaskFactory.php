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
        $title = fake()->sentence();
        return [
            'course_id' => \App\Models\Course::inRandomOrder()->first()->id ?? \App\Models\Course::factory(),
            'title' => 'Tugas: ' . $title,
            'slug' => \Illuminate\Support\Str::slug('Tugas: ' . $title) . '-' . uniqid(),
            'description' => fake()->paragraphs(3, true),
            'due_date' => fake()->optional(0.7)->dateTimeBetween('now', '+1 month'),
        ];
    }
}
