<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'location',
        'info',
        'from',
        'to',
        'confirm',
        'attach',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attach()
    {
        if($this->attach){
            return asset("/media/resume/".$this->attach);
        }
        return false;
    }

}
