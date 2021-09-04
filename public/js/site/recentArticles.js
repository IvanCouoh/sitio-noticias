axios({
    method: 'get',
    url: 'api/noticias/recientes'
}).then((response) => {
    const element = document.getElementById('recent-articles');
    const long = response.data.length;
    let recentArticle = '';

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
                    <p class="article__author"><span>Por: </span> ${data.author} </p>
                </div>
            </a>
        `;
        element.innerHTML = recentArticle;

    }
});
