<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/page_style.css') }}" rel="stylesheet" type="text/css">--}}
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <title>Конференция 2020</title>

    {{--    favicon    --}}

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("favicon/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("favicon/site.webmanifest")}}">
    <link rel="mask-icon" href="{{asset("favicon/safari-pinned-tab.svg")}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{--   favicon end --}}
</head>


<body class="main">
@if (\Illuminate\Support\Facades\Auth::check())
    <button class="button small" style="width: 15%"><a href="{{ route('home') }}">Личный кабинет</a></button> <br><br>
@else
    <nav>
        <button class="button small"><a href="{{ route('login') }}">Войти</a></button>
        <button class="button small"><a href="{{ route('register') }}">Регистрация</a></button>

    </nav>
@endif
<main>
@yield('content')
</main>
</body>
</html>
