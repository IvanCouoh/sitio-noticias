@extends('layout.layoutSite')

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
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Escribe un comentario"
                    class="comment__area input"></textarea>
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
            const messageElement = document.getElementById('message');
            const article_id = {{ $article->id }}

            const data = {
                author: 'Javier',
                email: 'javier@gmail.com',
                message: messageElement.value,
                article_id: article_id,
            }
            axios.post('/api/comentarios', data)
                .then(res => {
                    const messageElement = document.getElementById('message');
                    messageElement.value = "";
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.success("Comentario publicado");
                    updateComments();
                }).catch(error => {
                    console.log(error);
                });
        })

        const updateComments = () => {
            const article_id = {{ $article->id }}

            axios({
                method: 'get',
                url: '/api/commentario/' + article_id,
            }).then(response => {
                const long = response.data[0].comments.length;
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
                    response.data[0].comments.forEach(element => {

                        listComments += `
                        <div class="comment__container">
                            <div class="comment__publish">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrw6TFJfxQTpixJo4fe2VDEBKrNfyPUhkTdw&usqp=CAU"
                                    alt="" class="comment__publish-profile">
                                <div class="comment__info">
                                    <div class="comment__data">
                                        <p>${element.author}</p>
                                        <p>${element.created_at}</p>
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