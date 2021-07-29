<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="header"></header>
        <aside class="aside">
            <div class="content__info">
                <img src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="profile_admin"
                    class="content__profile">
                <div class="content__name">Javier Herrera</div>
            </div>
            <div class="aside__links">
                <a href="/sitio-noticias/public/categorias" class="link" title="Alta de categorías">
                    <box-icon type='solid' name='category' color="white"></box-icon>
                    <p class="link__name">Alta de categorías</p>
                </a>

                <a href="/sitio-noticias/public/noticias" class="link" title="Alta de noticias">
                    <box-icon type='solid' name='news' color="white"></box-icon>
                    <p class="link__name">Alta de noticias</p>
                </a>

                <a href="#" class="link" title="Mis publicaciones">
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
</body>

</html>
