<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/site/styles.css') }}">
    <title>Noticias</title>
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="logo">HC<span>News</span></h1>
        </div>
        <div class="categoryGroup">
            <a href="{{ url('/inicio') }}" class="item__home">Inicio</a>
            <div class="categoryGroup__item">
                @for ($i = 1; $i <= 18; $i++)
                    <a href="#" class="item">Item {{ $i }}</a>
                @endfor
            </div>
        </div>
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>

@yield('script')

</html>
