<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/common2.css') }}" />
    @yield('css')
</head>

<body>
    <div class="header">
        <div class="header__inner">
            <h2>Atte</h2>
        </div>
            <div class="header-prompt">
                <a href="/stamp">打刻ページ</a>
                <a href="/attendances">日付一覧</a>
                <a href="/login">ログアウト</a>
            </div>
    </div>

    <main>
        @yield('content')
    </main>
    <footer>
        <div class="surface-ground text-center mt-2 py-2">
        <p>Atte, inc.</p>
        </div>
    </footer>
</body>

