<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class City extends Model
{
    protected $fillable=['name','province','country','number_of_schools','timezone'];
    
    public function schools(){
        return $this->hasMany('App\Models\School' ,'city_id' ,'id');
    }
}