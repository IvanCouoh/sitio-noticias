@extends('layout.layoutAdmin')

@section('content')
    <div class="col-1-custom">
        <div class="main__form">
            <h3 class="main__subtitle">Crear noticia</h3>
            <form action="{{ route('noticias.store') }}" method="Post" class="form">
                @csrf
                @include('admin.articles.form', ['action' => 'create'])
            </form>
        </div>
    </div>
@endsection
