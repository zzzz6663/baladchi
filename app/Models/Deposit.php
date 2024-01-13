<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'advertise_id',
        'type',
        'amount',
        'status',
        'reflux',
        'accept',
        'seen',
        'deposit_day',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function advertise(){
        return $this->belongsTo(Advertise::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function check_status_color(){
        $color='';
        switch($this->status){
            case"payed": $color="green" ; break;
            case"confirmed_deposit": $color="green" ; break;
            case"cancelled": $color="orange" ; break;
            case"denied": $color="orange" ; break;
            case"created": $color="created" ; break;
            case"reject_deposit": $color="orange" ; break;
        }
        return $color;
    }
}

