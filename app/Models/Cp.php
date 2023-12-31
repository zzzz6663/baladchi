<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cp extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_id',
        'telic_id',
        'parent_id',
        'name',
        'icon',
    ];
}
