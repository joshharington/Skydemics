<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller {

    public function index() {
        $courses = Course::orderBy('name', 'ASC')->with('discipline')->get();

        return view('layouts.lecturer.courses.list', ['courses' => $courses]);
    }

    public function show(Course $course) {
        dd($course);
    }

    public function destroy(Course $course) {
        $this->authorize('delete', $course);

        $course->delete();

        session()->flash('success_message', 'Course deleted.');
        return redirect()->route('lecturer.courses');
    }

}
