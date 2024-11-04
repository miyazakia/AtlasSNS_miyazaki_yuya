<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <a href="/top"><img src="{{ asset('images/atlas.png')}}" class="atlas"></a>
            <div id="nav-open">
                    <p class="username">{{ Auth::user()->username }}　さん</p>
                    <div class="accordion">
                        <p class="nav-btn"></p>
                            <ul class="nav-menu">
                            <li><a href="/top">HOME</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                            </ul>
                    </div>
                <div class="icon"><img src="{{ asset('/storage/images/' . Auth::user()->images) }}">
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="follow-list">
                <p>フォロー数</p>
                    <p class="count">{{ Auth::user()->followings()->count() }}名</p>
                </div>
                <div class="btn-block">
                <p class="btn"><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                </div>
                <div class="follower-list">
                <p>フォロワー数</p>
                <p class="count">{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <div class="btn-block">
                <p class="btn"><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a></p>
                </div>
            </div>
                <div class="btn-search-block">
                <p class="btn-user-search"><a href="/search" class="btn btn-primary">ユーザー検索</a></p>
                </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
