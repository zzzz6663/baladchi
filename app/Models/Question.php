<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'fa',
        'en',
        'show',
    ];
    public function subsets(){
        return $this->belongsToMany(Subset::class)->withPivot(['active','required']);
    }
    public function telics(){
        return $this->belongsToMany(Telic::class)->withPivot(['active','required']);
    }
}
