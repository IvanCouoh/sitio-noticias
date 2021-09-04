<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/site/styles.css') }}">

    {{-- alert messages --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>Noticias</title>
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="logo">HC<span>News</span></h1>
        </div>
        <div class="categoryGroup">
            <a href="{{ url('/') }}" class="item__home">Inicio</a>
            <div class="categoryGroup__item" id="categoryGroup-content">
            </div>
        </div>
    </header>
    <div class="content" id="content">
        @yield('content')
    </div>
</body>

<script src="https://unpkg.com/boxicons@2.0.8/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@yield('scripts')

<script src="{{ asset('js/site/filterCategory.js') }}"></script>

</html>
