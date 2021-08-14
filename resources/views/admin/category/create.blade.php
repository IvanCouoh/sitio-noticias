@extends('layout.layoutAdmin')

@section('content')

<title>@section('title', 'Crear categoría')</title>

<div class="col-1-custom">

    {{-- CATEGORY --}}
    <div class="main__form">
        <h3 class="main__subtitle">Crear categoría</h3>
        <form action="{{ url('/categorias') }}" method="Post" class="form">
            @csrf
            @include('admin.category.form', ['text'=>'Añadir'])
        </form>
    </div>
</div>

@endsection
