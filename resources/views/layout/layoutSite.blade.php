<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/site/styles.css') }}">
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

<script>
    axios({
        method: 'get',
        url: 'api/categoria'
    }).then((response) => {
        let getId = document.getElementById('categoryGroup-content');
        let content = '';

        const dataLength = response.data.length;

        for (let index = 0; index < dataLength; index++) {
            const data = response.data[index];
            content += `
                    <div class="item" onclick="filterArticlesByCategoryId(this, ${data.id})" >${data.name}</div>
                `;
        }

        getId.innerHTML = content;

    })


    const filterArticlesByCategoryId = (context, category_id) => {
        event.preventDefault();

        /* Add active link when clicked */
        let categoryListLinks = document.querySelectorAll('#categoryGroup-content .item');
        categoryListLinks.forEach(element => {
            element.classList.remove('active');
        });
        context.classList.add('active');

        /* ------------------------------------ */

        axios({
            method: 'get',
            url: 'api/noticias/by-category-id/' + category_id,
        }).then(response => {
            const getIdContent = document.getElementById('recent-articles');
            const getIdTitle = document.getElementById('title-recent').innerHTML = response.data[0].category
                .name;

            let element = '';
            let long = response.data.length;

            for (let i = 0; i < long; i++) {
                const data = response.data[i];

                let coverImage = data.image.includes('http') ? data.image : `storage/${data.image}`;

                element += `
                    <a href="/noticia/${data.id}" class="article__card">
                        <img src="${coverImage}"
                            alt="" class="article__news_cover">
                        <div class="article__info">
                            <span class="badge-custom">${data.category.name}</span>
                            <h1 class="article__title"> ${data.name} </h1>
                            <p class="article__date"> ${data.published_at} </p>
                            <div class="article__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dolorem sapiente eaque eum deleniti alias vero dicta voluptate aut sunt magnam inventore quaerat reiciendis voluptates, vitae iste amet adipisci aliquam.</div>
                            <p class="article__author"><span>Por: </span> ${data.author} </p>
                        </div>
                    </a>
                `;
            };

            getIdContent.innerHTML = element;
        });
    };
</script>

</html>
