<?php

namespace App\Http\Controllers\Student\Courses;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller {

    public function show(User $user, Course $course, Module $module, Lesson $lesson) {



        return view('layouts.student.courses.lessons.single', ['lecturer' => $user, 'course' => $course, 'module' => $module, 'lesson' => $lesson]);
    }
}
