@extends('layouts.login')

@section('content')
<div class="search-form">
    <form action="/search" method="post">
    @csrf
        <input type="text" name="keyword" class="search" placeholder="ユーザー名" value="{{ request()->input('keyword') }}">
        <button type="submit"><img src="{{ asset('images/search.png') }}" class="img-search"></button>
    </form>
    <!-- 検索ワードの表示 -->
@if(!empty($keyword))
    <p class="search-word">検索ワード: {{ $keyword }}</p>
@endif

</div>


    <table class="table">
        @foreach($users as $user)
        <tr>
            <td><img src="{{ asset('/storage/images/' . $user->images) }}" alt="{{ $user->username }}の画像" class=user-icon ></td>
            <td>{{ $user->username }}</td>

            <td>
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
            </td>
        </tr>
        @endforeach
    </table>

@endsection
