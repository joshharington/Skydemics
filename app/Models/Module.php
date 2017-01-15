<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    public $incrementing = true;
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id', 'name', 'description', 'slug', 'featured_image_id', 'start_date', 'end_date', 'extra_info',
        'position', 'published', 'published_date', 'temp_guid'
    ];

    public function getRouteKeyName() {
        return 'slug';
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

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class, 'module_id', 'id')->orderBy('lessons.position', 'ASC')->orderBy('lessons.name', 'ASC');
    }

}

//id
//course_id
//name
//description
//slug
//featured_image_id
//start_date
//end_date
//extra_info
//position
//published
//published_date