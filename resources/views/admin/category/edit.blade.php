@extends('layouts.admin')

@section('content')
<title>@section('title', 'Editar categoría')</title>
<div class="main__form">
    <h3 class="main__subtitle">Editar categoría</h3>
    <form action="{{ route('categorias.update', $category->id) }}" method="post" class="form">
        @csrf
        {{ method_field('PATCH') }}
        @include('admin.category.form', ['method' => 'edit'])
    </form>
</div>
@endsection
