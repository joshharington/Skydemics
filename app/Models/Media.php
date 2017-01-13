<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    public $incrementing = true;
    protected $table = 'media';
    protected $primaryKey = 'id';
    protected $fillable = [
        'filename', 'link', 'thumb_lg', 'thumb_md', 'thumb_sm', 'ext', 'uploader_id', 'uploader_date'
    ];

}

//id
//filename
//link
//thumb_lg
//thumb_md
//thumb_sm
//ext
//uploader_id
//upload_date