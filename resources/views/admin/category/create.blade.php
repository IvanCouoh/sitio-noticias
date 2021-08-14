@extends('layout.layoutAdmin')

@section('content')

<title>@section('title', 'Crear categoría')</title>

<div class="col-1-custom">

    {{-- CATEGORY --}}
    <div class="main__form">
        <h3 class="main__subtitle">Crear categoría</h3>
        <form action="{{ route('categorias.store') }}" method="Post" class="form">
            @csrf
            @include('admin.category.form', ['text'=>'Añadir', 'method' => 'create'])
        </form>
    </div>
</div>

@endsection
