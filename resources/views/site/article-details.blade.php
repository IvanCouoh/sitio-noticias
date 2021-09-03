@extends('layouts.site')

@section('content')
    <div class="main__form">
        <h2 class="article__title__admin">{{ $article->name }}</h2>
        <img src="{{ strpos($article->image, 'http') !== false ? $article->image : asset('storage/' . $article->image) }}"
            alt="" class="article__image">
        <div class="article__info-actions">
            <div>
                <div class="article__info__admin">
                    <i class='bx bx-user'></i>
                    <p>{{ $article->author }}</p>
                </div>
                <div class="article__info__admin">
                    <i class='bx bx-category'></i>
                    <p>{{ $article->category->name }}</p>
                </div>
                <div class="article__info__admin">
                    <p>Fecha de publicación:&nbsp;</p>
                    <i class='bx bx-time-five'></i>&nbsp;
                    <p>{{ $article->published_at }}</p>
                </div>
                <div class="article__info__admin">
                    <p>Fecha de creación:&nbsp;</p>
                    <i class='bx bx-time-five'></i>&nbsp;
                    <p>{{ $article->created_at }}</p>
                </div>
            </div>
        </div><br>
        <p>{!! $article->description !!}</p>
    </div>
    <br>
    <div class="main__form__comments">
        <form action="" class="comment__container" id="idForm">
            <div class="write__comment">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrw6TFJfxQTpixJo4fe2VDEBKrNfyPUhkTdw&usqp=CAU"
                    alt="" class="comment__profile">
                <div class="container__inputs">
                    <div class="form__group">
                        <label for="author">Nombre</label>
                        <input type="text" class="input" id="author">
                    </div>
                    <div class="form__group">
                        <label for="email">Email</label>
                        <input type="email" class="input" id="email">
                    </div>
                </div>
                <div class="form__group text-area">
                    <label for="message">Mensaje</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Escribe un comentario"
                        class="comment__area input"></textarea>
                </div>
            </div>
            <div class="publish__comment">
                <input type="submit" class="button public" value="Publicar">
            </div>
        </form>

        <p class="comment__title">Comentarios (<span id="cantidad"></span>)</p>
        <div class="comment__container" id="comment-container">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const form = document.getElementById('idForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const authorElement = document.getElementById('author');
            const emailElement = document.getElementById('email');
            const messageElement = document.getElementById('message');
            const article_id = {{ $article->id }}

            const data = {
                author: authorElement.value,
                email: emailElement.value,
                message: messageElement.value,
                article_id: article_id,
            }
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
        })

        const updateComments = () => {
            const article_id = {{ $article->id }}

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
                        .getMonth()]}-${date.getUTCFullYear()} ${date.getHours()}:${date.getMinutes()} ${amOrPm}`

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
    </script>
@endsection
