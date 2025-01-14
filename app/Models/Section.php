<?php

namespace App\Models;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class Section extends Model
{  use SoftDeletes , HasRoles ;
    protected $fillable= [

        'name' ,
        'num_of_student' ,
    
        ];
    

        
    public function school(){
        return $this->belongsTo(School::class);
    }

    
    public function courses(){
        return $this->HasMany(Course::class);
    }

}
