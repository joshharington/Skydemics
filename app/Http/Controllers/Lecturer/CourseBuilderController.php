<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Requests\StoreCourseBuilderRequest;
use App\Models\Course;
use App\Models\Discipline;
use App\Http\Controllers\Controller;

class CourseBuilderController extends Controller {

    public function index() {
        $disciplines = Discipline::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        $resulting_array = [null => 'No Discipline'] + $disciplines;

        return view('layouts.lecturer.courses.builder', ['disciplines' => $resulting_array]);
    }

    public function create(StoreCourseBuilderRequest $request) {

        $course = new Course;

        $course->name = $request->title;
        $course->description = $request->description;
        $course->slug = $request->slug;
        $course->creator_id = $request->user()->id;
        $course->lecturer_id = $request->user()->id;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->discipline_id = $request->discipline;

        if($request->has('published')) {
            $course->published = ($request->published == 'on') ? 0 : 1;
            $course->published_date = time();
        } else {
            $course->published = 0;
            $course->published_date = 0;
        }

        if($request->has('invite_only')) {
            $course->invite_only = ($request->invite_only == 'on') ? 0 : 1;
        }

        if($request->has('public_enrollment')) {
            $course->is_open = ($request->public_enrollment == 'on') ? 0 : 1;
        }

        if($request->has('manually_accept')) {
            $course->auto_accept_enrollments = ($request->manually_accept == 'on') ? 0 : 1;
        }

        $course->save();

        session()->flash('success_message', 'Course saved.');
        return redirect()->route('courses.builder'); // take to show page

    }

    public function show(Course $course) {

    }

    public function update() {}

    public function destroy() {}

}
