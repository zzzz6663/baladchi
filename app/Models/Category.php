<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , QueryCacheable;

    protected $fillable = [
        'name',
        'icon',
        'info',
        'active',
        'slug',
        'price',
        'parent_id',
    ];

    public function subsets(){
        return $this->hasMany(Subset::class);
    }
    public function subsets_cash(){
        if(cache()->has("subsets".$this->id)){
            $subsets=cache()->get("subsets".$this->id);
        }else{
            $subsets = $this->hasMany(Subset::class)->get();
            cache()->put("subsets".$this->id,$subsets );
        }
        return $subsets;
    }
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
}
