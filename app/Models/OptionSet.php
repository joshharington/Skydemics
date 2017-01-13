<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionSet extends Model {

    public $incrementing = true;
    protected $table = 'option_sets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'question_id', 'option', 'is_correct', 'position'
    ];

}

//id
//question_id
//option
//is_correct
//position
