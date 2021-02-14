<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class World extends Model
{
    use SoftDeletes;

    public function heroes()
    {
        return $this->hasMany(Hero::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'desc',
    ];
}
