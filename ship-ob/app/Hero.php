<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

    public function scopeInWorld($query, App\World $world)
    {
        $query->where('world_id', $world->id);
    }

    protected $fillable = [
        'x', 
        'y',
    ];
}
