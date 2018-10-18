<?php

namespace App\Http\Models;

use App\User;

class Post extends Model
{
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    /**
     * 关联user表
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 关联comment表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * 判断用户是否点赞过
     * @param $user_id
     * @return $this
     */
    public function zan($user_id)
    {
        return $this->hasOne(Zan::class)->where('user_id' , $user_id);
    }

    /**
     * 关联zan表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zans()
    {
        return $this->hasMany(Zan::class , 'post_id' , 'id');
    }
}
