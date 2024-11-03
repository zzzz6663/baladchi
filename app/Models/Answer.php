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
        'sound',
        'video',
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
    public function sound_clip()
    {
        if($this->sound){
            return asset("/media/counsel/".$this->sound);
        }
        return false;
    }

    public function sound_path()
    {
        if($this->sound){

            return     base_path("public/media/counsel/" . $this->sound);
        }
        return false;
    }

    public function video_path()
    {
        if($this->video){

            return     base_path("public/media/counsel/" . $this->video);
        }
        return false;
    }
    public function video_clip()
    {
        if($this->video){
            return asset("/media/counsel/".$this->video);
        }
        return false;
    }
}
