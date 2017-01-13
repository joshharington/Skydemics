<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model {

    public $incrementing = true;
    protected $table = 'question_sets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'questionable_id', 'questionable_type', 'deadline'
    ];

    public function questionable() {
        return $this->morphTo();
    }

}

//id
//questionable_id
//questionable_type
//deadline