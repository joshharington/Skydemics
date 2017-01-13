<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    public $incrementing = true;
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'questionset_id', 'question', 'option_set_id', 'required', 'deadline', 'position', 'construct_random'
    ];

}

//id
//questionset_id
//question
//option_set_id
//required
//deadline
//position
//construct_random