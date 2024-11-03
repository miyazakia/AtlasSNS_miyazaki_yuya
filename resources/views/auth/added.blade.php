@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="add">
    <p class="addUser">{{ session('username') }}さん<br>ようこそ！AtlasSNSへ！</p>
    <p class="addText">ユーザー登録が完了しました。<br>早速ログインをしてみましょう！</p>

    <p class="lg"><a class="btn btn-danger" href="/login" role="button">ログイン画面へ</a></p>
  </div>
</div>
@endsection
