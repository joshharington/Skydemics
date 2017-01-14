<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Course $course) {
        return $user->canUpdateCourse($course);
    }

    public function delete(User $user, Course $course) {
        return $user->canDeleteCourse($course);
    }

}
