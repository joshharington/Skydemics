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

    public function question_set() {
        return $this->hasOne(QuestionSet::class, 'questionset_id', 'id');
    }

    public function option_set() {
        return $this->hasOne(OptionSet::class, 'option_set_id', 'id');
    }

}

//id
//questionset_id
//question
//option_set_id
//required
//deadline
//position
//construct_random