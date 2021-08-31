<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}">

    {{-- alert messages --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>@yield('title')</title>
</head>

<body>
    <div class="container__custom">
        <header class="header">
            <a href="/" target="_blank" rel="noopener noreferrer" class="my-site">Ver mi sitio</a>
            <span>
                <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out' style="font-size: 20px"></i>
                    {{ __('Cerrar sesion') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </span>
        </header>
        <aside class="aside">
            <div class="content__info">
                <img src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="profile_admin"
                    class="content__profile">
                <div class="content__name">{{ Auth::user()->name }}</div>
            </div>
            <div class="aside__links">
                <a href="{{ route('categorias.index') }}" class="link" title="Alta de categorías">
                    <box-icon type='solid' name='category' color="white"></box-icon>
                    <p class="link__name">Alta de categorías</p>
                </a>

                <a href="{{ route('noticias.create') }}" class="link" title="Alta de noticias">
                    <box-icon type='solid' name='news' color="white"></box-icon>
                    <p class="link__name">Alta de noticias</p>
                </a>

                <a href="{{ route('noticias.index') }}" class="link" title="Mis publicaciones">
                    <box-icon type='solid' name='archive-out' color="white"></box-icon>
                    <p class="link__name">Mis publicaciones</p>
                </a>
            </div>
        </aside>
        <main class="main">
            @yield('content')
        </main>
    </div>
    <script src="https://unpkg.com/boxicons@2.0.8/dist/boxicons.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('javascript');
</body>

</html>
