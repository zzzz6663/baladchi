<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'parent_id',
        'type'
    ];
    public function parent(){
        return $this->belongsTo(Skill::class,'parent_id','id');
    }
    public function childs(){
        return Skill::where("parent_id",$this->id)->get();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function counsels(){
        return $this->belongsToMany(Counsel::class);
    }

    public function type_child(){
        if($this->type=="parent"){
            return "child";
        }
         if($this->type=="child"){
            return "grandchild";
        }
    }

}
