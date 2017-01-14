<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Course;
use App\Http\Controllers\Controller;

class LessonBuilderController extends Controller {

    public function index(Course $course) {

        $lessons = $course->lessons;

        return view('layouts.lecturer.courses.builder.lessons.list', ['course' => $course]);
    }

    public function create() {}

    public function store() {}

    public function show() {}

    public function update() {}

    public function destroy() {}

}
