<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    @yield('css')
</head>

<body>

    @if (!isset($hideHeader))
        <header class="header">
            <div class="header__inner">

                <a class="header__logo" href="/">
                    FashionablyLate
                </a>

                <div class="header__nav">
                    @if (request()->is('register'))
                        <a href="{{ route('login') }}">login</a>
                    @elseif (request()->is('login'))
                        <a href="{{ route('register') }}">register</a>
                    @endif
                </div>

            </div>
        </header>
    @endif

    <main class="main">
        @yield('content')
    </main>

</body>

</html>