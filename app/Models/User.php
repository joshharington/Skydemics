<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Ultraware\Roles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoleAndPermission;

    public $incrementing = true;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password', 'media_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function created_tags() {
        return $this->hasMany(Tag::class, 'creator_id', 'id');
    }

    public function created_courses() {
        return $this->hasMany(Course::class, 'creator_id', 'id');
    }

    public function lecturing_courses() {
        return $this->hasMany(Course::class, 'lecturer_id', 'id');
    }

    public function media_uploaded() {
        return $this->hasMany(Media::class, 'uploader_id', 'id');
    }

    public function files_uploaded() {
        return $this->hasMany(File::class, 'uploader_id', 'id');
    }

    public function managing_orgs() {
        return $this->hasMany(Org::class, 'admin_id', 'id');
    }

    public function enrolled_in() {
        return $this->hasMany(Enrollment::class, 'user_id', 'id');
    }

    public function enrolled_users() {
        return $this->hasMany(Enrollment::class, 'enrolled_by_user_id', 'id');
    }

    public function disciplines() {
        return $this->hasMany(Lecturer::class, 'user_id', 'id');
    }

    public function canUpdateCourse(Course $course) {
        return $course->creator_id == $this->id ||$course->lecturer_id == $this->id;
    }

    public function canDeleteCourse(Course $course) {
        return $course->creator_id == $this->id ||$course->lecturer_id == $this->id;
    }

}
