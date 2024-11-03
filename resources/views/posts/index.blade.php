@extends('layouts.login')

@section('content')
  {!! Form::open(['url' => 'post/create']) !!}
    <div class="post-container">
      <img src="{{ asset('/storage/images/' . Auth::user()->images) }}" class="user-icon">

          {!! Form::textarea('newPost',null,['required','class' => 'form-control-lg','placeholder' => '投稿内容を入力してください。']) !!}

        <button type="submit" ><img src="images/post.png" class="postBtn" alt="送信"></button>

    </div>
  {!! Form::close() !!}

  <footer>
  <small></small>
  </footer>

  <div class="user-postContainer">
    @foreach($posts as $post)
      <div class="post-card">

        @if (auth::user()->isFollowing($post->user->id) || auth::user()->id == $post->user->id)
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

              @if(($post->user_id ==Auth::user()->id))
              <div class="post-btn">
                <div class="new-contents">
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"></a>
                </div>
                <div class="new-contents">
                <a class="postDelete" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除しますか。よろしいですか？')"></a>
                </div>
              </div>

        </ul>
        @endif




      @endif
<!-- <span></span> -->

    </div>
      @endforeach
  </div>
@endsection
<!-- モーダル -->
  <div class="modal js-modal">
    <div class="modal_bg js-modal-close"></div>
      <div class="modal_content">
        <form action="/post/update" method="post">
          @csrf
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="id" class="modal_id">
          <button type="submit"><img src="./images/edit.png" alt="編集"class="Up-post-img"></button>
        </form>
        <a class="js_modal_close" href=""></a>
      </div>
    </div>
  </div>
