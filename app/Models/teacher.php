<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Model
{
    use SoftDeletes;
    protected $fillable=['name','age','course_id'];
    //public $timestamps=false;

    public function school(){
        return $this->belongsTo(School::class);
    }

 

}
