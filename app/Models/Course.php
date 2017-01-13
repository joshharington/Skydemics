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