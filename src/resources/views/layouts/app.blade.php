<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <div class="app">
        <form class="form" action="/logout" method="post">
            @csrf
            <h1 class="header__heading">Atte</h1>
            <div class="header-links">
                @if(Auth::check())
                <a href="{{ route('stamp') }}">ホーム</a>
                <a href="{{ route('attendance.index') }}">日付一覧</a>
                <button type="submit">ログアウト</button>
                @endif
            </div>
            @yield('link')
        </form>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        <small>&copy; Atte, Inc. </small>
    </footer>
</body>
</html>
