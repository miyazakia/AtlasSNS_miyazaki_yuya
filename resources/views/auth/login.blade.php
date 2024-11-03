@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

    @if ($errors->has('login_error'))
        <div class="alert alert-danger">
            {{ $errors->first('login_error') }}
        </div>
  @endif

<div class="content">

  <p class="welcome">AtlasSNSへようこそ</p>

    <ul>
    <li class="mail_title">{{ Form::label('メールアドレス') }}</li>
    <li class="mail_form a">{{ Form::text('mail',null,['class' => 'input']) }}</li>
    <li class="pass_title">{{ Form::label('パスワード') }}</li>
    <li class="pass_form a">{{ Form::password('password',['class' => 'input']) }}</li>
    </ul>
  <input type="submit" value="ログイン" class="btn btn-danger" style="margin-left: 140px; padding-left:30px; padding-right:30px;">

  <p class="create_user"><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}

@endsection
