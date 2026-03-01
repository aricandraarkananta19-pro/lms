<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $courses = Course::query()
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('courses.index', compact('courses', 'search', 'perPage'));
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
            'image' => 'nullable|image|max:2048', // optional if using basic upload
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('image')) {
            $course->addMediaFromRequest('image')->toMediaCollection('course_image');
        }

        return redirect()->route('courses.index')->with('success', 'Data Kursus berhasil ditambahkan!');
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
            'image' => 'nullable|image|max:2048',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('image')) {
            $course->clearMediaCollection('course_image');
            $course->addMediaFromRequest('image')->toMediaCollection('course_image');
        }

        return redirect()->route('courses.index')->with('success', 'Data Kursus berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Data Kursus berhasil dihapus!');
    }
}
