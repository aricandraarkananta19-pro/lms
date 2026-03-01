<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function globalIndex()
    {
        $tasks = Task::with('course')->latest()->paginate(10);
        return view('tasks.global_index', compact('tasks'));
    }

    public function index(Course $course)
    {
        $tasks = $course->tasks()->paginate(10);
        return view('tasks.index', compact('course', 'tasks'));
    }

    public function create(Course $course)
    {
        return view('tasks.form', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $course->tasks()->create($request->all());

        return redirect()->route('courses.tasks.index', $course)->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function show(Course $course, Task $task)
    {
        return view('tasks.show', compact('course', 'task'));
    }

    public function edit(Course $course, Task $task)
    {
        return view('tasks.form', compact('course', 'task'));
    }

    public function update(Request $request, Course $course, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('courses.tasks.index', $course)->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Course $course, Task $task)
    {
        $task->delete();
        return redirect()->route('courses.tasks.index', $course)->with('success', 'Tugas berhasil dihapus.');
    }

    public function submit(Request $request, Course $course, Task $task)
    {
        $request->validate([
            'file' => 'required|file|max:10240' // 10MB max
        ]);

        $filePath = $request->file('file')->store('task_submissions', 'public');

        \App\Models\TaskSubmission::updateOrCreate(
            ['user_id' => auth()->id(), 'task_id' => $task->id],
            [
                'file_path' => $filePath,
                'status' => 'Menunggu Penilaian'
            ]
        );

        return redirect()->back()->with('success', 'Tugas berhasil diunggah dan menunggu penilaian.');
    }
}
