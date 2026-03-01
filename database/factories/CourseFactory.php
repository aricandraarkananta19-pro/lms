<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->numberBetween(100, 1000) * 1000,
        ];
    }
}
