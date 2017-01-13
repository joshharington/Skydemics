<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    public $incrementing = true;
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id', 'name', 'description', 'slug', 'featured_image_id', 'start_date', 'end_date', 'extra_info',
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