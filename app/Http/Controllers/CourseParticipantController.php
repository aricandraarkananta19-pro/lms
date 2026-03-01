<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseParticipantController extends Controller
{
    public function index(Course $course)
    {
        $participants = $course->participants()->paginate(10);

        // Fetch users who are not yet participants to add them
        $availableUsers = User::whereNotIn('id', $course->participants->pluck('id'))->get();

        return view('courses.participants.index', compact('course', 'participants', 'availableUsers'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $course->participants()->attach($request->user_id, ['enrolled_at' => now()]);

        return back()->with('success', 'Peserta berhasil ditambahkan ke kursus.');
    }

    public function destroy(Course $course, User $participant)
    {
        $course->participants()->detach($participant->id);

        return back()->with('success', 'Peserta berhasil dikeluarkan dari kursus.');
    }
}
