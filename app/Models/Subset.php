<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subset extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'info',
        'slug',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function telics(){
        return $this->hasMany(Telic::class);
    }

    public function telics_cash(){
        if(cache()->has("telics".$this->id)){
            $telics=cache()->get("telics".$this->id);
        }else{
            $telics = $this->hasMany(Telic::class)->get();
            cache()->put("telics".$this->id,$telics );
        }
        return $telics;
    }



    public function questions(){
        return $this->belongsToMany(Question::class)->withPivot(['active','required']);
    }
    public function filters(){
        return $this->belongsToMany(Filter::class)->withPivot(['active','required']);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }

}
