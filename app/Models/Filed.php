<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filed extends Model {

    public $incrementing = true;
    protected $table = 'filed';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fileable_id', 'fileable_type', 'file_id'
    ];

    public function fileable() {
        return $this->morphTo();
    }

    public function file() {
        return $this->hasOne(File::class, 'id', 'file_id');
    }

}

//id
//fileable_id
//fileable_type
//file_id