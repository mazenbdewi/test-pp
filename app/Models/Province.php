<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\School;

class Province extends Model
{
    protected $fillable=['name','population','code','area','description','country_id'];
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    public function schools(){
        return $this->hasMany('App\Models\School' ,'province_id' ,'id');
    }
    
}