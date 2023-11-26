<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $fillable=[
        'brand_id',
        'year',
    ];

    public function  brand(){
        return $this->belongsTo(Brand::class);
    }
}
