<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_id',
        'telic_id',
        'parent_id',
        'name',
        'icon',
    ];
    public function telic()
    {
        return $this->belongsTo(Telic::class);
    }
    public function parent()
    {
        return Brand::find($this->parent_id);
    }
    public function childs()
    {
        return Brand::where('parent_id', $this->id)->get();
    }

 


    public function top_telic()
    {
        return $this->telic ?? $this->parent()->telic;
    }

    public function  years(){
        return $this->hasMany(Year::class);
    }
    public function  icon(){

        return asset("/media/brand/".$this->icon);
         $this->hasMany(Year::class);
    }

    public function ss()
    {
        return $this->hasOne(self::class, 'id', 'id')
            ->where('parent_id', '!=',$this->id);
            // ->where('name', $name);
    }
}
