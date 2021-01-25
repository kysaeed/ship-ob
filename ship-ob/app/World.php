<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    protected $fillable = [
        'name',
        'desc',
    ];
}
