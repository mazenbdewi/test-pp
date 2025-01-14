<?php

namespace App\Models;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class Student extends Model
{
    use SoftDeletes , HasRoles ;
    protected  $fillable=[ 
      
   'first_name',
   'middle_name',
   'last_name',
   'mother_name',
   'email' ,
 
   'section_id', 
   'address',          
   'national_id',        
   'college_name',       
   'specialization',     
   'overall_grade' ];

   public function school(){
    return $this->belongsTo(School::class);
}
public function section()
{
    return $this->belongsTo(Section::class, 'section_id');
}


public function courses()
{
    return $this->belongsToMany(Course::class, 'student_courses', 'student_id', 'course_id');
}


}
