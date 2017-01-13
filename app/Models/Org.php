<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Org extends Model {

    public $incrementing = true;
    protected $table = 'orgs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'description', 'slug', 'address', 'website', 'email', 'phone', 'admin_id'
    ];

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function lecturers() {
        return $this->hasMany(Lecturer::class, 'discipline_id', 'id');
    }

}

//id
//name
//description
//slug
//address
//website
//email
//phone
//admin_id