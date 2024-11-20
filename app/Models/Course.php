<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Course extends Model
{
    use HasFactory; 
    protected $fillable=[
        'name' 
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_courses');
    }
    
}
