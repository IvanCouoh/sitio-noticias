@extends('layouts.site')

@section('content')
    <input type="text" id="article" class="article__id" value="{{ $article->id }}">
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
    <script src="{{ asset('js/site/comments.js') }}"></script>
@endsection
