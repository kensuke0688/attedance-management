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
                <button type="submit">ホーム</button>
                <button type="submit">日付一覧</button>
                <button type="submit">ログアウト</button>
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