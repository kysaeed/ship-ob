<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function world()
    {
        return $this->belongsTo('App\World');
    }

    protected $fillable = [
        'x', 
        'y',
    ];
}
