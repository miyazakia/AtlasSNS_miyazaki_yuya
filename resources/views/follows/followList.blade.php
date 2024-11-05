@extends('layouts.login')

@section('content')


<div class="user">
  <div>
  <p>フォローリスト</p>
  </div>
  <!-- ユーザーアイコン -->
    <div class="user-icons">
    @foreach($followings as $following)
      <a href="{{route('userprofile',['id' => $following->id])}}">
        <img src="{{ asset('/storage/images/'.$following->images) }}" alt="{{ $following->username }}のアイコン" class="user-icon">
      </a>

    @endforeach
    </div>
</div>


  <div class="user-postContainer">
  @foreach ($followingsPosts as $post)
      <div class="post-card">

        <ul>
        <li class="post-list">
        <a href="{{route('userprofile',['id' => $post->user->id])}}">
        <img src="{{ asset('/storage/images/'.$post->user->images) }}" alt="{{ $post->user->username }}" class="user-icon"></a>
          <div class="post-contents">
            <div>
              <div class="username">{{ $post->user->username }}
              </div>
              <div class="timestamp">{{ $post->created_at->format('Y-m-d H:i') }}</div>
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
