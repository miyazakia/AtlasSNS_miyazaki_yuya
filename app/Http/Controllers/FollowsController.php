<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $followings = Auth::user()->followings()->get();
    // フォローしているユーザーの投稿を取得
        $followingsIds = $followings->pluck('id'); // フォローしているユーザーのIDを取得
        $followingsPosts = Post::whereIn('user_id', $followingsIds)
        ->with('user') // 投稿を取得する際に関連するユーザー情報も取得
        ->orderBy('created_at', 'desc') // 新しい順にソート
        ->get();

    return view('follows.followList', compact('followings', 'followingsPosts'));
    }

    public function followerList(){
        $followers = Auth::user()->followers()->get();
        //フォロワーの投稿を取得
        $followersIds = $followers->pluck('id');
        $followersPosts = Post::whereIn('user_id', $followersIds)
        ->with('user') // 投稿を取得する際に関連するユーザー情報も取得
        ->orderBy('created_at', 'desc') // 新しい順にソート
        ->get();
;
        return view('follows.followerList', compact('followers', 'followersPosts'));
    }
        // フォロー処理
    public function follow($user)
    {
        $currentUser = auth()->user();

        if (!$currentUser->isFollowing($user)) {
            $currentUser->followings()->attach($user);  // フォロー
        }
        // dd($id);

        return redirect()->back();
    }

    // フォロー解除処理
    public function unfollow($user)
    {
        $currentUser = auth()->user();

        if ($currentUser->isFollowing($user)) {
            $currentUser->followings()->detach($user);  // フォロー解除
        }

        return redirect()->back();
    }

}
