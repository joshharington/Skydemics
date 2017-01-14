<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Module $module) {
        return $user->canUpdateCourse($module->course);
    }

    public function delete(User $user, Module $module) {
        return $user->canDeleteCourse($module->course);
    }

}
