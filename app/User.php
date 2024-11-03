<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

       // 投稿機能リレーション
    public function posts(){
    return $this->hasMany('App\Post');
    }
   //フォローしているユーザーを取得
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id')->where('followed_id', '!=', $this->id);
    }

   //フォロワーを取得
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id')->where('following_id', '!=', $this->id);
    }

       // フォローしているかどうかを確認
    public function isFollowing($user): bool
    {
        $userId = $user instanceof User ? $user->id : $user;  // オブジェクトかIDか確認
    return $this->followings()->where('followed_id', $userId)->exists();
    }

    // フォローされているかどうかを確認
    public function isFollowedBy($user): bool
    {
        $userId = $user instanceof User ? $user->id : $user;  // オブジェクトかIDか確認
    return $this->followers()->where('following_id', $userId)->exists();
    }
}
