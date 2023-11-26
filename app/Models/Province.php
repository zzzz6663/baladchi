<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'image'
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }
    public function cities_cash(){

        if(cache()->has("cities")){
            $cities=cache()->get("cities");
        }else{
            $cities = $this->hasMany(City::class)->get();
            cache()->put("cities",$cities );
        }
        return $cities;
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function travel(){
        return $this->hasOne(Travel::class);
    }
    public function adventure(){
        return $this->hasOne(Adventure::class);
    }
    public function image(){
        if($this->image){
            return asset('/media/province/'.$this->image);
        }
        return false;
    }
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
}
