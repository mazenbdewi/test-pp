<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $fillable=[ 
      
   'first_name',
   'middle_name',
   'last_name',
   'mother_name',
   'email' ,
   'course_id', 
   'address',          
   'national_id',        
   'college_name',       
   'specialization',     
   'overall_grade' ];
}
