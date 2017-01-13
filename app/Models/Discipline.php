<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model {

    public $incrementing = true;
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'parent_id'
    ];

}

//id
//name
//slug
//parent_id