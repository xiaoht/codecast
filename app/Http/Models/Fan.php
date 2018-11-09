<?php

namespace App\Http\Models;

use App\User;

class Fan extends Model
{
    /**
     * 粉丝用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuser()
    {
        return $this->hasOne(User::class, 'id', 'fan_id');
    }

    /**
     * 关注用户
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suser()
    {
        return $this->hasOne(User::class, 'id', 'star_id');
    }
}
