<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use Spatie\Permission\Traits\HasRoles;

use App\Models\teacher;
use App\Models\Student;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use SoftDeletes , HasRoles ;
    use HasFactory;
    protected $fillable=[
        'name','type','rooms_num','capacity','address','photo',
    ];


    public function sections(){
        return $this->HasMany(Section::class);
    }


    public function teachers(){
        return $this->HasMany(teacher::class);
    }

    
    public function students(){
        return $this->HasMany(Student::class);
    }



}
