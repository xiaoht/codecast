<?php

namespace App\Http\Models;

class Post extends Model
{
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }
}
