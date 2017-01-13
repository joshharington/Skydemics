<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model {

    public $incrementing = true;
    protected $table = 'lecturers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'discipline_id', 'org_id'
    ];

}

//id
//user_id
//discipline_id
//org_id