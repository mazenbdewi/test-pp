<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable =['name' ,'seats','type','level' ,'school_id' ];
    public function school()
    {
        return $this->belongsToMany('App\Models\Tag','school_id');
    }
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
