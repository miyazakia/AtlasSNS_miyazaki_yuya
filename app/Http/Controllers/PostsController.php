<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::with('user')->orderBy('created_at','desc')->get();
        return view('posts.index',compact('posts'));
    }

    public function followList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }

// 投稿機能
    public function create(){
        return view('post/create');
    }
// データを作成し、保存する（投稿機能）
    public function store(Request $request){
        // 新しい投稿を作成
        // バリデーション
            $request-> validate([
                'newPost' => 'required|min:1|max:150',
            ]);

        $post = new Post;
        $post-> user_id = Auth::user()->id;
        $post-> post = $request-> newPost;
        $post->save();
        return redirect('/top');
    }


    //データの更新（投稿機能）
    public function update(Request $request){
        $request-> validate([
                'upPost' => 'required|min:1|max:150',
            ]);
        $id = $request->input('id');
        $post = Post::find($id);
        $post->post = $request-> upPost;

        $post->save();
        return redirect('/top');
    }

    // データの消去（投稿機能）
    public function delete($id){
        Post::where('id',$id)->delete();
        return back();
    }
}
