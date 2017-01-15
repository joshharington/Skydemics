<?php

namespace App\Http\Controllers\Student\Courses;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller {

    public function index() {
        $courses = Course::orderBy('name', 'ASC')->with('lecturer')->get();

        return view('layouts.student.courses.list', ['courses' => $courses]);
    }

    public function show(Course $course) {
        return view('layouts.student.courses.single', ['course' => $course]);
    }

}
