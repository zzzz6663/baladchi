<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;
    protected $fillable=[
        'fa',
        'en',
        'active',
    ];
    public function subsets(){
        return $this->belongsToMany(Subset::class)->withPivot(['active','required']);
    }
    public function telics(){
        return $this->belongsToMany(Telic::class)->withPivot(['active','required']);
    }
}
