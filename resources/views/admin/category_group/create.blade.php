@extends('layout.layoutAdmin')

@section('content')

<title>@section('title', 'Crear grupo de categorías')</title>

<div class="col-1-custom">

    {{-- CATEGORY GROUP --}}
    <div class="main__form">
        <h3 class="main__subtitle">Crear una categoría padre</h3>
        <form action="{{ route('grupo_categoria.store') }}" method="Post" class="form">
            @csrf
            @include('admin.category_group.form',['text'=>'Añadir'])
        </form>
    </div>
</div>

@endsection
