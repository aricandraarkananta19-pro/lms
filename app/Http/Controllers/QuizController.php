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

    public function submit(Request $request, Course $course, Quiz $quiz)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        $questions = \App\Models\QuizQuestion::where('quiz_id', $quiz->id)->get();
        $totalQuestions = $questions->count();
        $correctAnswers = 0;

        if ($totalQuestions > 0) {
            foreach ($questions as $question) {
                $userAnswer = $request->answers[$question->id] ?? null;
                if ($userAnswer === $question->correct_option) {
                    $correctAnswers++;
                }
            }
        }

        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        $isPassed = $score >= 70;

        \App\Models\QuizSubmission::updateOrCreate(
            ['user_id' => auth()->id(), 'quiz_id' => $quiz->id],
            ['score' => $score, 'is_passed' => $isPassed]
        );

        if ($isPassed) {
            $certificateNumber = 'CERT-' . strtoupper(uniqid());
            $certificate = \App\Models\Certificate::firstOrCreate(
                ['user_id' => auth()->id(), 'course_id' => $course->id],
                [
                    'certificate_number' => $certificateNumber,
                    'issued_at' => now()
                ]
            );

            // Generate PDF using dompdf
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('certificates.template', [
                'user' => auth()->user(),
                'course' => $course,
                'quiz' => $quiz,
                'certificate' => $certificate
            ]);

            $fileName = 'certificates/' . $certificateNumber . '.pdf';
            \Illuminate\Support\Facades\Storage::disk('public')->put($fileName, $pdf->output());

            $certificate->update(['file_path' => $fileName]);
        }

        return redirect()->back()->with('success', "Kuis disubmit! Nilai Anda: $score " . ($isPassed ? "(Lulus)" : "(Gagal)"));
    }
}
