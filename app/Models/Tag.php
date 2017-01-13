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

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function tagged_items() {
        return $this->belongsToMany(Tagged::class, 'tag_id', 'id');
    }

}

//id
//name
//slug
//creator_id