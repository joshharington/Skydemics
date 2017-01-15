<?php

namespace App\Http\Controllers\Student\Courses;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller {

    public function store(User $user, Course $course) {
        $enrollment = Enrollment::firstOrNew(['course_id' => $course->id, 'user_id' => Auth::user()->id]);

        $enrollment->enrolled_by_user_id = Auth::user()->id;
        $enrollment->accepted_by_student = 1;

        if($course->auto_accept_enrollments == 1) {
            $enrollment->accepted_by_lecturer = 1;
            $enrollment->is_request = 0;
            $enrollment->enrolled_date = time();
        } else {
            $enrollment->is_request = 1;
        }

        $enrollment->save();
        return redirect()->route('student.courses.single.curriculum', [$course->lecturer_id, $course->slug]);
    }
}
