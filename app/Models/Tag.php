<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    public $incrementing = true;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'creator_id'
    ];

}

//id
//name
//slug
//creator_id