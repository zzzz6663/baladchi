<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'info',
        'slug',
        'subset_id',
    ];
    public function subset(){
        return $this->belongsTo(Subset::class);
    }
    public function questions(){
        return $this->belongsToMany(Question::class)->withPivot(['active','required']);
    }
    public function brands(){
        return $this->hasMany(Brand::class);
    }
    public function show_brand($id)
    {
        return Brand::find($id);
    }


    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
  public function filters(){
        return $this->belongsToMany(Filter::class)->withPivot(['active','required']);
    }

}
