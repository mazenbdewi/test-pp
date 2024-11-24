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
   'overall_grade',
   'school_id',
   'division_id',
   'level'];
   public function division()
    {
        return $this->belongsToMany('App\Models\Division','division_id');
    }
    public function school()
    {
        return $this->belongsToMany('App\Models\School','school_id');
    }
}
