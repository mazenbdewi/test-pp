<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\province;


class School extends Model
{

    use HasFactory;
    protected $fillable=[
        'name','type','rooms_num','capacity','address','province_id'
     ];

    public function province(){
        return $this->belongsTo('App\Models\province','province_id','id');
    }
}
