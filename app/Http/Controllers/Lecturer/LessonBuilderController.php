<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Module;

class LessonBuilderController extends Controller {

    public function index(Course $course) {
        $lessons = $course->lessons;

        return view('layouts.lecturer.courses.builder.lessons.list', ['course' => $course, 'lessons' => $lessons]);
    }

    public function create(Course $course, Module $module) {
        return view('layouts.lecturer.courses.builder.lessons.create', ['course' => $course, 'module' => $module]);
    }

    public function store(StoreLessonRequest $request, Course $course, Module $module) {
        $lesson = new Lesson;

        $lesson->name = $request->title;
        $lesson->description = $request->description;
        $lesson->slug = $request->slug;
        $lesson->lesson_code = $request->attendance_code;
        $lesson->module_id = $module->id;
        $lesson->position = -1;

        if($request->has('start_date')) {
            $lesson->start_date = strtotime($request->start_date);
        }

        if($request->has('end_date')) {
            $lesson->end_date = strtotime($request->end_date);
        }

        if($request->has('published')) {
            $lesson->published = ($request->published == 'on') ? 1 : 0;
            $lesson->published_date = time();
        } else {
            $lesson->published = 0;
            $lesson->published_date = 0;
        }

        if($request->has('requires_attendance')) {
            $lesson->requires_attendance = ($request->requires_attendance == 'on') ? 1 : 0;
        } else {
            $lesson->requires_attendance = 0;
        }

        $lesson->save();

        session()->flash('success_message', 'Lesson created.');
        return redirect()->route('courses.builder.lessons', $course->slug);

    }

    public function show(Course $course, Lesson $lesson) {
        return view('layouts.lecturer.courses.builder.lessons.single', ['course' => $course, 'module' => $lesson->module, 'lesson' => $lesson]);
    }

    public function update(UpdateLessonRequest $request, Course $course, Lesson $lesson) {

        $lesson->name = $request->get('title', $lesson->name);
        $lesson->description = $request->get('description', $lesson->description);
        $lesson->slug = $request->get('slug', $lesson->slug);
        $lesson->lesson_code = $request->get('attendance_code', $lesson->lesson_code);
        $lesson->position = -1;

        if($request->has('start_date')) {
            $lesson->start_date = strtotime($request->start_date);
        }

        if($request->has('end_date')) {
            $lesson->end_date = strtotime($request->end_date);
        }

        if($request->has('published')) {
            $lesson->published = ($request->published == 'on') ? 1 : 0;
            $lesson->published_date = time();
        } else {
            $lesson->published = 0;
            $lesson->published_date = 0;
        }

        if($request->has('requires_attendance')) {
            $lesson->requires_attendance = ($request->requires_attendance == 'on') ? 1 : 0;
        } else {
            $lesson->requires_attendance = 0;
        }

        $lesson->save();

        session()->flash('success_message', 'Lesson updated.');
        return redirect()->route('courses.builder.lessons', $course->slug);

    }

    public function destroy() {}

}
