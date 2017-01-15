<?php

namespace App\Http\Controllers\Student\Courses;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller {

    public function index() {
        $courses = Course::orderBy('name', 'ASC')->with('lecturer')->get();

        return view('layouts.student.courses.list', ['courses' => $courses]);
    }

    public function show(User $user, Course $course) {
        return view('layouts.student.courses.single', ['lecturer' => $user, 'course' => $course]);
    }

}
