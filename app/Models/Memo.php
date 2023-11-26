<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    protected $fillable=[
        'advertise_id',
        'user_id',
        'to_id',
        'memo',
        'seen',
        'active',

    ];
    public function user(){
       return  $this->belongsTo(user::class);
    }
    public function users(){
        return $this->belongsToMany(user::class)->withPivot(['seen']);
    }

    public function advertise(){
        return  $this->belongsTo(Advertise::class);
    }
}
