<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

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
        return $this->hasOne(Discipline::class, 'discipline_id', 'id');
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