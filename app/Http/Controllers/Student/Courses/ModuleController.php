<?php

namespace App\Http\Controllers\Student\Courses;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller {

    public function index(User $user, Course $course) {
        return view('layouts.student.courses.modules', ['course' => $course, 'lecturer' => $user]);
    }

}
