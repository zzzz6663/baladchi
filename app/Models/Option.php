<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'optionable_id',
        'optionable_type',
        'name',//نام اپشن
        'val',//مقدار اپشن
        'info',// اطلاعات اضافه
        'active',
    ];
    public function optionable()
    {
        return $this->morphTo();
    }


}
