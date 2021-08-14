@extends('layout.layoutAdmin')

@section('content')

    @if (Session::has('message'))
        {{ Session::get('message') }}

    @endif

<title>@section('title', 'Editar grupo de categoría')</title>

<div class="col-1-custom">

    {{-- CATEGORY GROUP --}}
    <div class="main__form">
        <h3 class="main__subtitle">Editar grupo de categoría</h3>
        <form action="{{ url('/grupo_categoria/' . $categoryGroup->id) }}" method="Post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            @include('admin.category_group.form',['text'=>'Guardar edición'])
        </form>
    </div>

</div>

@endsection
