<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Student;
class Course extends Model
{  use SoftDeletes;
    //
    protected $fillable= [

    'course_name' ,
    // 'class' ,
    // 'teacher_name' ,
    'section_id',
    'teacher_id',
    'year' 
    ];

    public function section(){
        return $this->belongsTo(Section::class , 'section_id') ;
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

 
  
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses', 'course_id', 'student_id');
    }
    
}
