<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $coursesCount = Course::count();
        $classesCount = ClassRoom::count();
        $studentsCount = Student::count();
        $enrollmentsCount = Enrollment::count();

        $recentCourses = Course::latest()->take(5)->get();
        $recentClasses = ClassRoom::with('course')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'coursesCount',
            'classesCount',
            'studentsCount',
            'enrollmentsCount',
            'recentCourses',
            'recentClasses'
        ));
    }
}