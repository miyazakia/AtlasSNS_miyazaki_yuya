<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows'; // テーブル名を指定

    // フォロワーとのリレーション
    public function follower()
    {
        return $this->belongsTo(User::class, 'following_id');
    }

    // フォローされているユーザーとのリレーション
    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
