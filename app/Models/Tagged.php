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

    public function tag() {
        return $this->hasOne(Tag::class, 'tag_id', 'id');
    }

    public function taggable() {
        return $this->morphTo();
    }

}

//id
//taggable_id
//taggable_type
//tag_id