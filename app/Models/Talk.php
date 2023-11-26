<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    use HasFactory;
    protected $fillable=[
        'to_id',
        'user_id',
        'price',
        'status',
        'confirm',
        'amount',
        'confirm_id',


    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function talker(){
        return $this->belongsTo(User::class,"to_id");
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
