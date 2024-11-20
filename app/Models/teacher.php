<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable=['name','age'];
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_courses');
    }
    
}
