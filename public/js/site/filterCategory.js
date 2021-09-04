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
});

const filterArticlesByCategoryId = (context, category_id) => {
    event.preventDefault();

    let categoryListLinks = document.querySelectorAll('#categoryGroup-content .item');
    categoryListLinks.forEach(element => {
        element.classList.remove('active');
    });
    context.classList.add('active');

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
                        <p class="article__author"><span>Por: </span> ${data.author} </p>
                    </div>
                </a>
            `;
        };
        getIdContent.innerHTML = element;
    }).catch(error => {
        const getIdContent = document.getElementById('recent-articles');
        let element = '';
        element += `<p>No se encontraron noticias</p>`
        getIdContent.innerHTML = element;
    })
};
