<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $perPage = $request->input('per_page', 12);

        $courses = Course::with(['tasks', 'quizzes', 'participants'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            })
            ->when($category, function ($query, $category) {
                $query->where('category', $category);
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('courses.index', compact('courses', 'search', 'category'));
    }

    public function create()
    {
        return view('courses.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'level' => 'nullable|string',
            'duration_hours' => 'nullable|integer|min:1',
            'status' => 'nullable|string|in:draft,published,archived',
            'image' => 'nullable|image|max:2048',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'level' => $request->level ?? 'beginner',
            'duration_hours' => $request->duration_hours,
            'status' => $request->status ?? 'published',
        ]);

        if ($request->hasFile('image')) {
            $course->addMediaFromRequest('image')->toMediaCollection('course_image');
        }

        return redirect()->route('courses.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    public function edit(Course $course)
    {
        return view('courses.form', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'level' => 'nullable|string',
            'duration_hours' => 'nullable|integer|min:1',
            'status' => 'nullable|string|in:draft,published,archived',
            'image' => 'nullable|image|max:2048',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'level' => $request->level ?? 'beginner',
            'duration_hours' => $request->duration_hours,
            'status' => $request->status ?? 'published',
        ]);

        if ($request->hasFile('image')) {
            $course->clearMediaCollection('course_image');
            $course->addMediaFromRequest('image')->toMediaCollection('course_image');
        }

        return redirect()->route('courses.index')->with('success', 'Pelatihan berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Pelatihan berhasil dihapus!');
    }
}
