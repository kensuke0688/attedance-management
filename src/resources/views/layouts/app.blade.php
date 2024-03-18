<!DOCTYPE html>
<html lang="en">
    
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
                <a href="/">ホーム</a>
                <a href="/date-list">日付一覧</a>
                <a href="/logout">ログアウト</a>
            </div>
            @yield('link')
        </form>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
<div class="footer">
    <small>&copy; Atte,inc.</small>
</div>

</html>