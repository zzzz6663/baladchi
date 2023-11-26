<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=[
        'advertise_id',
        'user_id',
        'info',
        'active',
        'name',
    ];
    public function user(){
return $this->belongsTo(User::class);
    }
    public function advertise(){
        return $this->belongsTo(Advertise::class);
            }
}
