@extends('layout.layoutAdmin')

@section('content')

<title>@section('title', 'Crear categoría')</title>

<div class="col-1-custom">

    {{-- CATEGORY --}}
    <div class="main__form">
        <h3 class="main__subtitle">Crear categoría</h3>
        {{-- ' ahora puedes hacer la prueba y correr la pagina de create y abrir el inspector de elementos
        y veras que la url de post se genera automaticamente como admin/categorias
        pero veo que tienes que corregir igual el link de el boton de agregar  --}}
        <form action="{{ route('categorias.store') }}" method="Post" class="form">
            @csrf
            @include('admin.category.form', ['text'=>'Añadir'])
        </form>
    </div>
</div>

@endsection
