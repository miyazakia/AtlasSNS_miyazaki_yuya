<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        // $id = $request->query('id');
        // $user = User::find($id);
        // $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('users.profile',compact('user'));
    }

    public function profileUpdate(Request $request){
        $user = Auth::user();
        $images = Auth::user()->images;

        $validator = Validator::make($request->all(),
        ['username'=> 'required|min:2|max:12',
        'mail'=> 'required|min:5|max:40|email|unique:users,mail,'.$user->id,
        'password'=>'required|alpha_dash|min:8|max:20|confirmed',
        'password_confirmation'=>'required|alpha_dash|min:8|max:20|',
        'bio'=>'max:150',
        'images'=>'image|mimes:jpg,png,bmp,gif,svg|max:2048',
    ]);
    // if($validator->fails()){
    //     return redirect()->back()
    //                      ->withErrors($validator)
    //                      ->withInput();
    // }
            if ($request->hasFile('images')) {
            $image = $request->file('images')->store('public/images');
            $imageName = basename($image);
        } else {
            $imageName = $user->images;
        }
        $validator->Validate();
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = bcrypt($request->input('password'));
        $user->bio = $request->input('bio');
        $user->images = $imageName;
        $user->save();

        return redirect('/top');
    }


    public function userProfile($id){
        $users = User::where('id',$id)->get();
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->get();
        // dd($user);
        return view('users.userprofile',compact('users','posts'));
    }

    public function search(){
    $loggedInUserId = auth()->id();
    $users = User::where('id', '!=', $loggedInUserId)->get();
        return view('users.search')->with('users',$users);
    }

    // 検索
    public function userSearch(Request $request) {
    $loggedInUserId = auth()->id();
    $users = User::where('id', '!=', $loggedInUserId)->get();
    $keyword = $request->input('keyword');
    $query = User::query();

    if (!empty($keyword)) {
            $users = User::where('id', '!=', $loggedInUserId ) // 自分以外のユーザー
                    ->where('username', 'LIKE', "%{$keyword}%") // 部分一致でユーザー名を検索
                    ->paginate(20);
    }

    // ビューにデータを渡す
    return view('users.search', compact('users', 'keyword')); // ビューに $users と $keyword を渡す
}


}
