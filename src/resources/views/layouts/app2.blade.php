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
                <a href="/">打刻ページ</a>
                <a href="/attendance">日付一覧</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; padding: 0; font: inherit;">ログアウト</button>
            </form>
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

