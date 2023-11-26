<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'imageable_id',
        'imageable_type',
        'image',//نام اپشن
        'info',// اطلاعات اضافه
        'type',// اطلاعات اضافه
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
    public function ad_img()
    {
       $ad=   $this->imageable;
       $path=('/media/advertise/');
       if($ad->telic){
        $path.='telic'.$ad->telic->id;
       }else{
        $path.='subset'.$ad->subset->id;

       }
       $path.='/';
        return $path.$this->image;
    }
    public function path()
    {
       $ad=   $this->imageable;
       $path=public_path('/media/advertise/');
       if($ad->telic){
        $path.='telic'.$ad->telic->id;
       }else{
        $path.='subset'.$ad->subset->id;

       }
       $path.='/';
        return $path.$this->image;
    }
}
