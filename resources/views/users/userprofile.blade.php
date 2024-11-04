@extends('layouts.login')

@section('content')
@foreach($users as $user)
<div class="user-profile">

    <div class="user-card">
      <li class="user-info">
        <figure><img src="{{ asset('storage/images/' . $user->images) }}" class="user-icon"></figure>
        <div class="user-contents">
          <div class="profile-name">
          <p1>ユーザー名</p1>
          <p2>{{ $user->username }}</p2>
          </div>
          <div class="info">
          <p1>自己紹介</p1>
          <p2>{{ $user->bio }}</p2>
          </div>
        </div>
      </div>

      <div class="follow-btn">
        @if (auth()->user()->isFollowing($user))

        <form action="{{ route('unfollow', $user) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-md btn-danger" style="width: 120px;">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow', $user) }}" method="POST">
        @csrf
        <button type="submit"  class="btn btn-info btn-md" style="color:#fff; width:120px;">フォローする</button>
        </form>

        @endif
      </div>
    </li>

</div>
@endforeach

  <div class="user-postContainer">
    @foreach($posts as $post)
      <div class="post-card">

        <ul>
        <li class="post-list">
        <img src="{{ asset('/storage/images/'.$user->images) }}" class="user-icon">
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
