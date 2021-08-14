@extends('layout.layoutAdmin')

@section('content')
<title>@section('title', 'Editar categoría')</title>
<div class="main__form">
    <h3 class="main__subtitle">Editar categoría</h3>
    <form action="{{ url('/categorias/' . $category->id) }}" method="post" class="form">
        @csrf
        {{ method_field('PATCH') }}
        @include('admin.category.form')
    </form>
</div>
@endsection
