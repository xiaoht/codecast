<?php

namespace App;

use App\Http\Models\Comment;
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
}
