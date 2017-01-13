<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagged extends Model {

    public $incrementing = true;
    protected $table = 'tagged';
    protected $primaryKey = 'id';
    protected $fillable = [
        'taggable_id', 'taggable_type', 'tag_id'
    ];

}

//id
//taggable_id
//taggable_type
//tag_id