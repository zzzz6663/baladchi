<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'to_id',
        'title',
        'duration',
        'salary',
        'info',
        'contact',
        'seen',

    ];
     public function user(){
        return $this->belongsTo(User::class);
     }

     public function to(){
        return $this->belongsTo(User::class,'to_id');
     }

}
