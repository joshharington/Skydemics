<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model {

    public $incrementing = true;
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id', 'user_id', 'enrolled_by_user_id', 'enrolled_date', 'is_request', 'accepted_by_lecturer', 'accepted_by_student'
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function enrolled_by() {
        return $this->belongsTo(User::class, 'enrolled_by_user_id', 'id');
    }

}

//id
//course_id
//user_id
//enrolled_by_user_id
//enrolled_date
//is_request
//accepted_by_lecturer
//accepted_by_student