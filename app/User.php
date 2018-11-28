<?php

namespace App;

use App\Http\Models\Comment;
use App\Http\Models\Fan;
use App\Http\Models\Post;
use App\Http\Services\Email;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $data = [
            'url' => url('password/reset' , [
                $token
            ]),
        ];

        Email::SendCloud($data, $this, 'xiaohtstyle_reset_password');
    }

    /**
     * 关联post表
     * @return $this
     */
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at' , 'desc');
    }

    public function owns($model)
    {
        return (int) $this->id === (int) $model->user_id;
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
     * 关联zan表
     * @return $this
     */
    public function zans()
    {
        return $this->hasMany(Zan::class)->orderBy('created_at' , 'desc');
    }

    /**
     * 关注我的Fan模型
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fans()
    {
        return $this->hasMany(Fan::class, 'star_id', 'id');
    }

    /**
     * 我关注的Fan模型
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stars()
    {
        return $this->hasMany(Fan::class, 'fan_id', 'id');
    }

    /**
     * 关注某人
     * @param $uid
     * @return false|\Illuminate\Database\Eloquent\Model
     */
    public function doFan($uid)
    {
        $fan = new Fan();
        $fan->star_id = $uid;
        return $this->stars()->save($fan);
    }

    /**
     * 取消关注
     * @param $uid
     * @return false|\Illuminate\Database\Eloquent\Model
     */
    public function doUnfan($uid)
    {
        $fan = new Fan();
        $fan->star_id = $uid;
        return $this->stars()->delete($fan);
    }

    /**
     * 当前用户是否被uid关注
     * @param $uid
     * @return int
     */
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id', $uid)->count();
    }

    /**
     * 当前用户是否关注uid
     * @param $uid
     * @return int
     */
    public function hasStar($uid)
    {
        return $this->fans()->where('star_id', $uid)->count();
    }
}
