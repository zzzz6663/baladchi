<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'parent_id'
    ];

    public function parent(){
        return $this->belongsTo(Skill::class,'parent_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function counsels(){
        return $this->belongsToMany(Counsel::class);
    }

}
