<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {

    use SoftDeletes;

    public $incrementing = true;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'slug', 'is_open', 'invite_only', 'creator_id', 'lecturer_id', 'start_date', 'end_date',
        'discipline_id', 'published', 'published_date', 'featured_image_id', 'auto_accept_enrollments'
    ];

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function lecturer() {
        return $this->belongsTo(User::class, 'lecturer_id', 'id');
    }

    public function discipline() {
        return $this->hasOne(Discipline::class, 'id', 'discipline_id');
    }

    public function featured_image() {
        return $this->hasOne(Media::class, 'featured_image_id', 'id');
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }

    public function tags() {
        return $this->morphMany(Tagged::class, 'taggable');
    }

    public function files() {
        return $this->morphMany(Filed::class, 'fileable');
    }

    public function questions() {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function modules() {
        return $this->hasMany(Module::class, 'course_id', 'id');
    }

    public function lessons() {
        return $this->hasManyThrough(Lesson::class, Module::class);
    }

}

//id
//name
//description
//slug
//is_open
//invite_only
//creator_id
//lecturer_id
//start_date
//end_date
//discipline_id
//published
//published_date
//featured_image_id
//auto_accept_enrollments