@extends('layouts.site')

@section('content')
    <h1 class="title-recent" id="title-recent">Noticias recientes</h1>
    <hr id="divider">
    <div id="recent-articles">
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        axios({
            method: 'get',
            url: 'api/noticias/recientes'
        }).then((response) => {
            const element = document.getElementById('recent-articles');
            const title = document.getElementById('content-home');

            let recentArticle = '';

            const long = response.data.length;

            for (let index = 0; index < long; index++) {
                const data = response.data[index];

                let coverImage = data.image.includes('http') ? data.image : `storage/${data.image}`;

                recentArticle += `
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
                `
                element.innerHTML = recentArticle;

            }
        });
    </script>
@endsection
