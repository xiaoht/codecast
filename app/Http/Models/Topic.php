<?php

namespace App\Http\Models;

class Topic extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
