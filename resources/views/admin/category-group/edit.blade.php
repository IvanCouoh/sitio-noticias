@extends('layouts.admin')

@section('content')

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        </script>
    @endif

<title>@section('title', 'Editar grupo de categoría')</title>

<div class="col-1-custom">

    <div class="main__form">
        <h3 class="main__subtitle">Editar grupo de categoría</h3>
        <form action="{{ route('grupo_categoria.update', $categoryGroup->id) }}" method="Post" class="form">
            @csrf
            {{ method_field('PATCH') }}
            @include('admin.category-group.form',['text'=>'Guardar edición'])
        </form>
    </div>

</div>

@endsection
