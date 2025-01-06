<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '通販アプリ')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">ホーム</a>
            <a href="{{ route('cart.index') }}">カート</a>
            <a href="{{ route('products.create') }}">商品登録</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 通販アプリ</p>
    </footer>
</body>
</html>
