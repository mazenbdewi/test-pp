<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;


class School extends Model
{

    use HasFactory;
    protected $fillable=[
        'name','type','rooms_num','capacity','address','photo','city_id'
     ];

    public function city(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }
}
