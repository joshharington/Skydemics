<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

    public $incrementing = true;
    protected $table = 'lessons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'module_id', 'name', 'description', 'slug', 'start_date', 'end_date', 'lesson_code', 'requires_attendance',
        'position', 'published', 'published_date'
    ];

    public function tags() {
        return $this->morphMany(Tagged::class, 'taggable');
    }

    public function files() {
        return $this->morphMany(Filed::class, 'fileable');
    }

    public function questions() {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function module() {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

}

//id
//module_id
//name
//description
//slug
//start_date
//end_date
//lesson_code
//requires_attendance
//position
//published
//published_date