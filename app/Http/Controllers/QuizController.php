<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function globalIndex()
    {
        $quizzes = Quiz::with('course')->latest()->paginate(10);
        return view('quizzes.global_index', compact('quizzes'));
    }

    public function index(Course $course)
    {
        $quizzes = $course->quizzes()->paginate(10);
        return view('quizzes.index', compact('course', 'quizzes'));
    }

    public function create(Course $course)
    {
        return view('quizzes.form', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
        ]);

        $course->quizzes()->create($request->all());

        return redirect()->route('courses.quizzes.index', $course)->with('success', 'Kuis berhasil ditambahkan.');
    }

    public function show(Course $course, Quiz $quiz)
    {
        return view('quizzes.show', compact('course', 'quiz'));
    }

    public function edit(Course $course, Quiz $quiz)
    {
        return view('quizzes.form', compact('course', 'quiz'));
    }

    public function update(Request $request, Course $course, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'nullable|integer|min:1',
        ]);

        $quiz->update($request->all());

        return redirect()->route('courses.quizzes.index', $course)->with('success', 'Kuis berhasil diperbarui.');
    }

    public function destroy(Course $course, Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('courses.quizzes.index', $course)->with('success', 'Kuis berhasil dihapus.');
    }
}
