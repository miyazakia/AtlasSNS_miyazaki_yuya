@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile/update','method' => 'post', 'enctype'=>'multipart/form-data']) !!}
{{ Form::hidden('id',$user->id) }}

<div class="profile">
  <table class="profile-table">

<tr>
    <td><img src= "{{ asset('/storage/images/'.$user->images) }}" alt="{{ $user->username }}"のアイコン class='user-icon'></td>
    <td>{{ Form::label('username','ユーザー名') }}</td>
    <td>{{ Form::text('username',$user->username,['class'=>'form-control'])  }}</td>
    <td>@if ($errors->first('username'))
        <p class="alert alert-danger">※{{$errors->first('username')}}</p>
@endif</td>
</tr>

<tr>
    <td></td>
    <td>{{ Form::label('email','メールアドレス') }}</td>
    <td>{{ Form::text('mail',$user->mail,['class'=>'form-control']) }}</td>
    <td>@if ($errors->first('mail'))
        <p class="alert alert-danger">※{{$errors->first('mail')}}</p>
@endif</td>
</tr>

<tr>
    <td></td>
    <td>{{ Form::label('password','パスワード') }}</td>
    <td>{{ Form::password('password',['class'=>'form-control']) }}</td>
    <td>@if ($errors->first('password'))
          <p class="alert alert-danger">※{{$errors->first('password')}}</p>
        @endif
    </td>
</tr>

<tr>
    <td></td>
    <td>{{ Form::label('password_confirmation','パスワード確認') }}</td>
    <td>{{ Form::password('password_confirmation',['class'=>'form-control']) }}</td>
    <td>@if ($errors->first('password_confirmation'))
          <p class="alert alert-danger">※{{$errors->first('password_confirmation')}}</p>
    @endif
    </td>
</tr>

<tr>
    <td></td>
    <td>{{ Form::label('bio','自己紹介') }}</td>
    <td>{{ Form::text('bio',$user->bio,['class'=>'form-control']) }}</td>
    <td>@if ($errors->first('bio'))
          <p class="alert alert-danger">※{{$errors->first('bio')}}</p>
        @endif
    </td>
</tr>

<tr>
    <td></td>
    <td>{{ Form::label('images','アイコン画像') }}</td>
    <td>{{ Form::file('images',['class'=>'form-control']) }}</td>
    <td>@if ($errors->first('images'))
          <p class="alert alert-danger">※{{$errors->first('images')}}</p>
        @endif
      </td>
</tr>


  </table>
</div>

<div style="text-align:center;">
  {{ Form::submit('更新する',['class' => 'btn btn-danger']) }}
</div>
{!! Form::close() !!}
@endsection
