<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'parent_id',
        'name',

    ];
    public function users(){
        return $this->belongsToMany(Expert::class);
    }

  
}
