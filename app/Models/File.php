<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    public $incrementing = true;
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'filename', 'link', 'ext', 'uploader_id', 'upload_date'
    ];

    public function uploader() {
        return $this->belongsTo(User::class, 'uploader_id', 'id');
    }

    public function tags() {
        return $this->morphMany(Tagged::class, 'taggable');
    }

    public function filed() {
        return $this->belongsToMany(Filed::class, 'id', 'file_id');
    }

}

//id
//filename
//link
//ext
//uploader_id
//upload_date