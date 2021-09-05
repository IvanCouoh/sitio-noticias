var articleIdElement = document.getElementById('article');
var article_id = articleIdElement.value;

const updateCommentList = () => {
    axios({
        method: 'get',
        url: `/api/comentarios/${article_id}/noticia`,
    }).then((response) => {

        let listRowText = '';
        const element = document.getElementById('list-comments');

        if (response.data[0].comments == 0) {
            listRowText += `<p class="text-center">No hay comentarios</p>`;
            element.innerHTML = listRowText;
        } else {
            response.data[0].comments.forEach(item => {
                listRowText += `
                    <li class="list-group-item d-flex comments__list">
                        <span>
                            ${item.message}
                        </span>
                        <div class="actions">
                            <button onclick="banComment('${item.id}');" style="background: ${item.is_banned === true ? '#c91b1b' : '#259b39'}; color: white; height: max-content;" class="button">
                                ${item.is_banned === false ? 'Unban' : 'Ban'}
                            </button>
                        </div>
                    </li>
                `;
            });

            element.innerHTML = listRowText;
        }
    });
}

updateCommentList();

const banComment = (comment_id) => {
    event.preventDefault();
    axios({
        method: 'get',
        url: `/api/comentarios/${comment_id}/ban`,
    }).then((response) => {
        updateCommentList();
    });
}
