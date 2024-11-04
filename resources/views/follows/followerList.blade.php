@extends('layouts.login')

@section('content')


<div class="user">
  <div>
  <p>フォロワーリスト</p>
  </div>
  <div class="user-icons">
  @foreach($followers as $follower)

  <!-- ユーザーアイコン -->
    <a href="{{route('userprofile',['id' => $follower->id])}}">
    <img src="{{ asset('/storage/images/'.$follower->images) }}" alt="{{ $follower->username }}のアイコン" class="user-icon">
    </a>

  @endforeach
  </div>
</div>


  <div class="user-postContainer">
    @foreach ($followersPosts as $post)
      <div class="post-card">

        <ul>
        <li class="post-list">
          <a href="{{route('userprofile',['id' => $post->user->id])}}">
        <img src="{{ asset('/storage/images/'.$post->user->images) }}" class="user-icon"></a>
          <div class="post-contents">
            <div>
              <div class="username">{{ $post->user->username }}
              </div>
              <div class="timestamp">{{ $post->created_at->format('Y-m-d') }}</div>
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
