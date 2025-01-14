<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Country extends Model
{
    protected $fillable=['name','capital','continent','language','area'];

    public function province(){
        return $this->hasMany('App\Models\Province' ,'country_id' ,'id');
    }
}