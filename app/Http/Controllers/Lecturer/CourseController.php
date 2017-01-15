<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
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

    public function destroy_module(Course $course, Module $module) {
        $this->authorize('delete', $module);

        $module->delete();

        session()->flash('success_message', 'Module deleted.');
        return redirect()->route('courses.builder.lessons', $course->slug);
    }

    public function destroy_lesson(Course $course, Lesson $lesson) {
        $this->authorize('delete', $lesson);

        $lesson->delete();

        session()->flash('success_message', 'Lesson deleted.');
        return redirect()->route('courses.builder.lessons', $course->slug);
    }

}
