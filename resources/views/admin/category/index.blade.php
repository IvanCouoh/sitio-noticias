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

<title>@section('title', 'Categorías')</title>

<div class="container__main">
    {{-- CATEGORY GROUP --}}
    <div class="main__list">
        <div class="main_head">
            <h3 class="main__subtitle">Grupo de categorías</h3>
            {{-- Aqui esta el link crudo igual.... cambialo por nombre de la ruta --}}
            <a href="{{ route('grupo_categoria.create') }}" class="button success">Nuevo</a>
        </div>
        @foreach ($categoryGroups as $categoryGroup)
            <div class="main__item__container">
                <p>{{ $categoryGroup->name }}</p>
                <div class="actions">
                    <form action="{{ route('grupo_categoria.destroy', $categoryGroup->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="main__a-link fail"
                            onclick="return confirm('Se eliminarán categorías que dependan de ésta. ¿Desea eliminar la este grupo de categorías?')">
                            <box-icon type='solid' name='trash' title="Eliminar" color="white" size="25px"></box-icon>
                        </button>
                    </form>
                    <a href="{{ route('grupo_categoria.edit', $categoryGroup->id) }}" class="main__a-link warning">
                        <box-icon type='solid' name='edit-alt' title="Editar" color="white" size="25px"></box-icon>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- CATEGORY --}}
    <div class="main__list">
        <div class="main_head">
            <h3 class="main__subtitle">Categorías</h3>
            {{-- En este no se que esté saliendo mal --}}
            <a href="{{ route('categorias.create') }}" class="button success">Nuevo</a>
        </div>
        @foreach ($categories as $category)
            <div class="main__item__container">
                <p> {{ $category->name }} <span
                        class="badge bg-primary">{{ $category->category_group->name }}</span> </p>
                <div class="actions">
                    <form action="{{ route('categorias.destroy', $category->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="main__a-link fail"
                            onclick="return confirm('Seguro quiere eliminar la categoría')">
                            <box-icon type='solid' name='trash' title="Eliminar" color="white" size="25px"></box-icon>
                        </button>
                    </form>
                    <a href="{{ route('categorias.edit', $category->id) }}" class="main__a-link warning">
                        <box-icon type='solid' name='edit-alt' title="Editar" color="white" size="25px"></box-icon>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
