<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'advertise_id',
        'to_id',
        'type',
        'deposit_id',
        'mode',
        'scam',
        'content',
        'other',
        'problem',
        'info',
    ];
    public function  user(){
return $this->belongsTo(User::class);
    }
     public function  advertise(){
return $this->belongsTo(Advertise::class);
    }
     public function  deposit(){
return $this->belongsTo(Deposit::class);
    }
}
