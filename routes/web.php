<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Root level menus for all tasks/quizzes
    Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'globalIndex'])->name('tasks.index');
    Route::get('/quizzes', [\App\Http\Controllers\QuizController::class, 'globalIndex'])->name('quizzes.index');

    // Nested resources for managing tasks/quizzes inside a course
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
    Route::resource('courses.tasks', \App\Http\Controllers\TaskController::class);
    Route::resource('courses.quizzes', \App\Http\Controllers\QuizController::class);

    // Participants
    Route::get('courses/{course}/participants', [\App\Http\Controllers\CourseParticipantController::class, 'index'])->name('courses.participants.index');
    Route::post('courses/{course}/participants', [\App\Http\Controllers\CourseParticipantController::class, 'store'])->name('courses.participants.store');
    Route::delete('courses/{course}/participants/{participant}', [\App\Http\Controllers\CourseParticipantController::class, 'destroy'])->name('courses.participants.destroy');
});

require __DIR__ . '/auth.php';
