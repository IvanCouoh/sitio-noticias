@extends('layout.layoutAdmin')

@section('content')
    <div class="col-1-custom">
        <div class="main__form">
            <h3 class="main__subtitle">Crear noticia</h3>
            <form action="{{ route('noticias.update', $article->id) }}" method="Post" class="form"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.articles.form', ['action' => 'edit'])
            </form>
        </div>
    </div>
@endsection
