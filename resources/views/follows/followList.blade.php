@extends('layouts.login')

@section('content')


<div class="user">
  <p>フォローリスト</p>
  <!-- ユーザーアイコン -->
    @foreach($followings as $following)
    <div class="user-icons">
      <a href="{{route('userprofile',['id' => $following->id])}}">
        <img src="{{ asset('/storage/images/'.$following->images) }}" alt="{{ $following->username }}のアイコン" class="user-icon">
      </a>
    </div>
    @endforeach
</div>


  <div class="user-postContainer">
  @foreach ($followingsPosts as $post)
      <div class="post-card">

        <ul>
        <li class="post-list">
        <a href="{{route('userprofile',['id' => $following->id])}}">
        <img src="{{ asset('/storage/images/'.$post->user->images) }}" alt="{{ $post->user->username }}" class="user-icon"></a>
          <div class="post-contents">
            <div>
              <div class="username">{{ $post->user->username }}
              </div>
              <div class="timestamp">{{ $post->created_at }}</div>
              </div>
              <div class="Post-content">
              {{ $post->post }}
              </div>
          </div>
        </li>
        </ul>
      </div>
  @endforeach
  </div>

@endsection
