<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'rep_id',
        'to_id',
        'counsel_id',
        'advertise_id',
        'deposit_id',
        'talk_id',
        'type',
        'transactionId',
        'amount',
        'status',
        'pay_from_cash',
        'holdover',//تمدیدآگهی
        'vip',//vip آگهی
        'notif',//ارسال نوتیف
        'sort',//نردبان
        'seen',//دیده شده ؟
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function to(){
        return $this->belongsTo(User::class,'to_id');
    }


    public function talks(){
        return $this->belongsTo(Talk::class);
    }


    public function advertise(){
        return $this->belongsTo(Advertise::class);
    }

    public function deposit(){
        return $this->belongsTo(Deposit::class);
    }
    public function talk(){
        return $this->belongsTo(Talk::class);
    }


    public function counsel(){
        return $this->belongsTo(Counsel::class);
    }




}
