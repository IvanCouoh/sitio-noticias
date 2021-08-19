@extends('layout.layoutAdmin')

@section('content')
    <div class="main__form">
        <h2 class="article__title__admin">{{ $article->name }}</h2>
        <img src="https://s.france24.com/media/display/688585be-9060-11ea-8c8d-005056a98db9/w:1400/p:16x9/journal-1920x1080_es.webp"
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
            <div>
                <div class="actions">
                    <form action="{{ route('noticias.destroy', $article->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="main__a-link fail"
                            onclick="return confirm('¿Está seguro de eliminar la noticia?')">
                            <box-icon type="solid" name="trash" title="Eliminar" color="white" size="25px"></box-icon>
                        </button>
                    </form>
                    <a href="{{ route('noticias.edit', $article->id) }}" class="main__a-link warning">
                        <box-icon type="solid" name="edit-alt" title="Editar" color="white" size="25px"></box-icon>
                    </a>
                </div>
            </div>
        </div><br>
        <p>{!! $article->description !!}</p>
    </div>

@endsection
