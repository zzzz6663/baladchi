<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselquestion extends Model
{
    use HasFactory;
    protected $fillable=[
        'counsel_id',
        'question',
        'type',
        'a1',
        'a2',
        'a3',
        'a4',
        'a5',
        'explain',//جواب تشریحی
        'answer',//جواب گزین های
    ];
    public function counsel(){
        return $this->belongsTo(Counsel::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }
    public function options(){
        $i=0;
        if($this->type=='multi'){
            if($this->a1){$i++;}
            if($this->a2){$i++;}
            if($this->a3){$i++;}
            if($this->a4){$i++;}
            if($this->a5){$i++;}
        }
        return $i;
    }
}
