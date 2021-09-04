const articleIdElement = document.getElementById('article');
const article = articleIdElement.value;

const form = document.getElementById('idForm');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const authorElement = document.getElementById('author');
    const emailElement = document.getElementById('email');
    const messageElement = document.getElementById('message');
    const article_id = article;

    const data = {
        author: authorElement.value,
        email: emailElement.value,
        message: messageElement.value,
        article_id: article_id,
    };

    axios.post('/api/comentarios', data)
        .then(res => {
            const authorElement = document.getElementById('author');
            const emailElement = document.getElementById('email');
            const messageElement = document.getElementById('message');
            authorElement.value = "";
            emailElement.value = "";
            messageElement.value = "";

            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("Comentario publicado");
            updateComments();
        }).catch(error => {
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("El comentario no pudo ser publicado, intente más tarde");
        });
});

const updateComments = () => {
    const article_id = article;

    axios({
        method: 'get',
        url: '/api/comentarios/no-baneados/' + article_id + '/noticia',
    }).then(response => {
        const long = response.data.comments.length;
        let getIdCommentList = document.getElementById('comment-container');
        let getIdCantidad = document.getElementById('cantidad');
        let catidad = '';
        let listComments = '';
        getIdCantidad.innerHTML = long;
        if (long === 0) {
            listComments +=
                `<p style="text-align:center;">Esta noticia aún no cuenta con comentarios.</p>`;
            getIdCommentList.innerHTML = listComments;
        } else {
            const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio',
                'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
            ];

            response.data.comments.forEach(element => {
                const date = new Date(element.created_at);
                const amOrPm = (date.getHours() < 12) ? "AM" : "PM";
                const newDate = `${date.getDate()}-${months[date
                    .getMonth()]}-${date.getUTCFullYear()} ${date.getHours()}:${date.getMinutes()} ${amOrPm}`;

                listComments += `
                    <div class="comment__container">
                        <div class="comment__publish">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrw6TFJfxQTpixJo4fe2VDEBKrNfyPUhkTdw&usqp=CAU"
                                alt="" class="comment__publish-profile">
                            <div class="comment__info">
                                <div class="comment__data">
                                    <p>${element.author}</p>
                                    <span>•</span>
                                    <p>${newDate}</p>
                                </div>
                                <p>${element.message}</p>
                            </div>
                        </div>
                    </div>
                `;
                getIdCommentList.innerHTML = listComments;
            });
        }
    })
}

updateComments();
