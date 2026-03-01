<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function employees()
    {
        return view('enterprise.employees');
    }

    public function compliance()
    {
        return view('enterprise.compliance');
    }

    public function certifications()
    {
        return view('enterprise.certifications');
    }

    public function analytics()
    {
        $totalCourses = Course::count();
        return view('enterprise.analytics', compact('totalCourses'));
    }

    public function learningPaths()
    {
        return view('enterprise.learning-paths');
    }

    public function webinars()
    {
        return view('enterprise.webinars');
    }
}
