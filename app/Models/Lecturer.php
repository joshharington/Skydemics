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

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discipline() {
        return $this->belongsTo(Discipline::class, 'discipline_id', 'id');
    }

    public function org() {
        return $this->belongsTo(Org::class, 'org_id', 'id');
    }

}

//id
//user_id
//discipline_id
//org_id