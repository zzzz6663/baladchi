<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
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
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
}
