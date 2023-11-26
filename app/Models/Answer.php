<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=[
        'counsel_id',
        'user_id',
        'question_id',
        'type',
        'answer',
    ];
    public function counsel (){
        return $this->belongsTo(Counsel::class);
    }
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function question (){
        return $this->belongsTo(Counselquestion::class);
    }
}
