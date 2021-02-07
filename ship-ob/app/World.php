<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    public function heroes()
    {
        return $this->hasMany(Hero::class);
    }

    protected $fillable = [
        'name',
        'desc',
    ];
}
