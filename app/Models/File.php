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

}

//id
//filename
//link
//ext
//uploader_id
//upload_date