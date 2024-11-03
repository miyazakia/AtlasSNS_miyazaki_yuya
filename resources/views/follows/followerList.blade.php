@extends('layouts.login')

@section('content')


<div class="user">
  <p>フォロワーリスト</p>
  @foreach($followers as $follower)
  <div class="user-icons">
  <!-- ユーザーアイコン -->
    <a href="{{route('userprofile',['id' => $follower->id])}}">
    <img src="{{ asset('/storage/images/'.$follower->images) }}" alt="{{ $follower->username }}のアイコン" class="user-icon">
    </a>
  </div>
  @endforeach
</div>


  <div class="user-postContainer">
    @foreach ($followersPosts as $post)
      <div class="post-card">

        <ul>
        <li class="post-list">
        <img src="{{ asset('/storage/images/'.$post->user->images) }}" class="user-icon">
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
