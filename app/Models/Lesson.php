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