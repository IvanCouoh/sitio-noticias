@extends('layouts.admin')

@section('content')
    <div class="col-1-custom">
        <div class="main__form">
            <h3 class="main__subtitle">Editar noticia</h3>
            <form action="{{ route('noticias.update', $article->id) }}" method="Post" class="form"
                enctype="multipart/form-data">
                <input type="text" id="article" class="article__id" value="{{ $article->id }}">
                @csrf
                @method('PATCH')
                @include('admin.articles.form', ['action' => 'edit'])
            </form>
        </div>
    </div>
@endsection
