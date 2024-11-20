<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Teacher extends Model
{
    use HasFactory; 
    protected $fillable=['name','age'];
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_courses');
    }
    
}
