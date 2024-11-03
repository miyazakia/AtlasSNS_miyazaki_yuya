@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="register">
        <p class="new_user">新規ユーザー登録</p>

        <ul>
        <li class="userName">{{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
        </li>
        @error('username')
                <span class="text-danger">{{ $message }}</span> <!-- エラーメッセージを表示 -->
        @enderror

        <li class="mail">{{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        </li>
        @error('mail')
                <span class="text-danger">{{ $message }}</span> <!-- エラーメッセージを表示 -->
        @enderror

        <li class="pass">{{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}
        </li>
        @error('password')
                <span class="text-danger">{{ $message }}</span> <!-- エラーメッセージを表示 -->
        @enderror

        <li class="passAgain">{{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',['class' => 'input']) }}
        </li>
        @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span> <!-- エラーメッセージを表示 -->
        @enderror

        </ul>

        <input type="submit" value="新規登録" class="btn btn-danger" style="margin-left: 160px;">

        <p class="back"><a href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}


@endsection
