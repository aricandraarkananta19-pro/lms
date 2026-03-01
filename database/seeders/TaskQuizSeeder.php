<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = \App\Models\Course::all();

        foreach ($courses as $course) {
            \App\Models\Task::factory()->count(rand(1, 3))->create([
                'course_id' => $course->id
            ]);

            \App\Models\Quiz::factory()->count(rand(1, 2))->create([
                'course_id' => $course->id
            ]);
        }
    }
}
