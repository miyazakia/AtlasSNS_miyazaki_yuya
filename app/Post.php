<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
        // 投稿機能リレーション
    public function user()
    {return $this->belongsTo('App\User');
    }
}
