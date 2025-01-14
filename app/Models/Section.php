<?php

namespace App\Models;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{  use SoftDeletes;
    protected $fillable= [

        'name' ,
        'num_of_student' ,
        'teacher_name' ,
        ];
    

        
    public function school(){
        return $this->belongsTo(School::class);
    }

    
    public function courses(){
        return $this->HasMany(Course::class);
    }

}
