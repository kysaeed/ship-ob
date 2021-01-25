<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function world()
    {
        $this->belongsTo('App\World');
    }

    protected $fillable = [
        'x', 
        'y',
    ];
}
