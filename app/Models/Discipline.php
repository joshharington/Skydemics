<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model {

    public $incrementing = true;
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug', 'parent_id'
    ];

    public function courses() {
        return $this->belongsToMany(Course::class, 'discipline_id', 'id');
    }

    public function parent() {
        return $this->belongsTo(Discipline::class, 'parent_id', 'id');
    }

    public function child() {
        return $this->hasMany(Discipline::class, 'id', 'parent_id');
    }

    public function lecturers() {
        return $this->hasMany(Lecturer::class, 'discipline_id', 'id');
    }

}

//id
//name
//slug
//parent_id