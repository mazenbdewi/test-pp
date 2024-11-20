<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    protected $table = 'teacher_courses';
    protected $fillable = ['course_id', 'teacher_id'];
}
