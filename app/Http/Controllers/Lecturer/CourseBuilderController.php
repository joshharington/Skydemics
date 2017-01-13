<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseBuilderController extends Controller {

    public function index() {
        return view('layouts.lecturer.courses.builder');
    }

    public function show() {}

    public function create() {}

    public function update() {}

    public function destroy() {}

}
