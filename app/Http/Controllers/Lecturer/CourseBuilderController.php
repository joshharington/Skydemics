<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Requests\StoreCourseBuilderRequest;
use App\Http\Requests\UpdateCourseBuilderRequest;
use App\Models\Course;
use App\Models\Discipline;
use App\Http\Controllers\Controller;

class CourseBuilderController extends Controller {

    public function index() {
        $disciplines = Discipline::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        $resulting_array = [null => 'No Discipline'] + $disciplines;

        return view('layouts.lecturer.courses.builder.create', ['disciplines' => $resulting_array]);
    }

    public function create(StoreCourseBuilderRequest $request) {

        $course = new Course;

        $course->name = $request->title;
        $course->description = $request->description;
        $course->slug = $request->slug;
        $course->creator_id = $request->user()->id;
        $course->lecturer_id = $request->user()->id;

        if($request->has('discipline') && $request->discipline != null) {
            $course->discipline_id = $request->discipline;
        }

        if($request->has('start_date')) {
            $course->start_date = strtotime($request->start_date);
        }

        if($request->has('end_date')) {
            $course->end_date = strtotime($request->end_date);
        }

        if($request->has('published')) {
            $course->published = ($request->published == 'on') ? 1 : 0;
            $course->published_date = time();
        } else {
            $course->published = 0;
            $course->published_date = 0;
        }

        if($request->has('invite_only')) {
            $course->invite_only = ($request->invite_only == 'on') ? 1 : 0;
            $course->is_open = 0;
        }

        if($request->has('public_enrollment')) {
            $course->is_open = ($request->public_enrollment == 'on') ? 1 : 0;
            $course->invite_only = 0;
        }

        if($request->has('manually_accept')) {
            $course->auto_accept_enrollments = ($request->manually_accept == 'on') ? 0 : 1;
        } else {
            $course->auto_accept_enrollments = 1;
        }

        $course->save();

        if($request->has('lessons') && $request->lessons == true) {
            return redirect()->route('courses.builder.lessons', $course->slug);
        }

        session()->flash('success_message', 'Course saved.');
        return redirect()->route('courses.builder.single', $course->slug);

    }

    public function show(Course $course) {
        $disciplines = Discipline::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        $resulting_array = [null => 'No Discipline'] + $disciplines;

        return view('layouts.lecturer.courses.builder.edit', ['course' => $course, 'disciplines' => $resulting_array]);
    }

    public function update(UpdateCourseBuilderRequest $request, Course $course) {

        $this->authorize('update', $course);

        $course->name = $request->get('title', $course->name);
        $course->description = $request->get('description', $course->description);
        $course->slug = $request->get('slug', $course->slug);
        $course->discipline_id = $request->get('discipline', $course->discipline_id);

        if($request->has('start_date')) {
            $course->start_date = strtotime($request->start_date);
        }

        if($request->has('end_date')) {
            $course->end_date = strtotime($request->end_date);
        }

        if($request->has('published')) {
            $course->published = ($request->published == 'on') ? 1 : 0;
            $course->published_date = time();
        } else {
            $course->published = 0;
            $course->published_date = 0;
        }

        if($request->has('invite_only')) {
            $course->invite_only = ($request->invite_only == 'on') ? 1 : 0;
            $course->is_open = 0;
        }

        if($request->has('public_enrollment')) {
            $course->is_open = ($request->public_enrollment == 'on') ? 1 : 0;
            $course->invite_only = 0;
        }

        if($request->has('manually_accept')) {
            $course->auto_accept_enrollments = ($request->manually_accept == 'on') ? 0 : 1;
        } else {
            $course->auto_accept_enrollments = 1;
        }

        $course->save();

        if($request->has('lessons') && $request->lessons == true) {
            return redirect()->route('courses.builder.lessons', $course->slug);
        }

        session()->flash('success_message', 'Course updated.');
        return redirect()->route('courses.builder.single', $course->slug);

    }

}
