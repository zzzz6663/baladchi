<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counsel extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'info',
        'user_id',
        'skill_id',
        'active',
        'qtype',
        'question',
        'pay',
        'price',
        'gender',
        'degree',
        'count',
        'type',
        'answers',
        'reward',
        'star',
        'status',
        'confirm',//تایید ادمین
        'select_id',//  کاربر انتخابس شده
        'url',//  لینک
        'img',//  عکس
        'removed',//  حذف
        'show_answer',//  نمایش جواب ها
        'sound',//  صدا
        'video',//      تصویر
//

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Counselquestions(){
        return $this->hasMany(Counselquestion::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function  viwecounsel_user(){
        return $this->belongsToMany(User::class,'viewcounsel_user');
    }


    public function answers_count(){
        return $this->answers()->distinct()->count('user_id');
    }
    public function answers(){
        return $this->hasmany(Answer::class);
    }
    public function check_seen(){
        $user=auth()->user();
        $id=null;
       $class=null;
        if($user){
            $id=$user->id;
        }
        if($this->viwecounsel_user()->where('user_id',$id)->first()){
            $class="seen";
        }
      return  $class;
     }
     public function visitor(){
        return User::find($this->chats()->first()->visitor_id);
     }

    public function check_for_active(){
        if($this->reward=="no_reward" &&  !$this->active ){
            return true;
        }

        if(in_array($this->reward,['select_the_best_answer','divide_reward']) &&  !$this->active &&  $this->pay){
            return true;
        }
        return false;
    }


    public function check_condition($user)
    {
        $counsel=$this;
        // dump($counsel);
        $data['gender']=!($counsel->gender &&  $counsel->gender != $user->gender);
        $data['degree']=!($counsel->degree && $counsel->degree != $user->degree);
        $data['star']=!($counsel->star&& $counsel->star <= $user->comment_log()['av']);
        $data['answer']=!($counsel->answers_count() >= $counsel->answers);

        if($counsel->skills()->count()){
            $data['skill']= array_intersect  ($counsel->skills()->pluck('id')->toArray(),$user->skills()->pluck('id')->toArray());
        }else{
            $data['skill'] =false;


        }
        if((($data['gender'])&& $data['degree'] && $data['star']  && $data['answer'])&&  $data['skill']){
        $data['pass']=true;
            return  $data;
        }
        $data['pass']=false;
        return  $data;
    }
    public function img()
    {
        if($this->img){
            return asset("/media/counsel/".$this->img);
        }
        return false;
    }
    public function sound_clip()
    {
        if($this->sound){
            return asset("/media/counsel/".$this->sound);
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
