<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'to_id',
        'advertise_id',
        'visitor_id',
        're_id',
        'type',
        'file',
        'seen',
        'chat',
        'sender',
        'uni'//کد یکتا چت,
    ];
    public function advertise()
    {
        return $this->belongsTo(Advertise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function visitor()
    {
        return $this->belongsTo(User::class,"visitor_id");
    }
    public function to()
    {
        // dd(93);
        return $this->belongsTo(User::class,"to_id");
    }
}
