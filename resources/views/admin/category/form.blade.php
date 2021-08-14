<div class="form__group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="input @error('name') is-invalid @enderror"
        value="{{ isset($category->name) ? $category->name : old('name') }}">
    @error('name')
        <p class="validation-message">{{ $message }}</p>
    @enderror
</div>
<div class="form__group">
    <label for="category_group_id">Gropo de categoría</label>
    <select name="category_group_id" id="category_group_id"
        class="input @error('category_group_id') is-invalid @enderror">
        <option value="0">Asigne una categoría padre</option>


        @if ($method == 'create')
            {{-- Esto sucede si creamos un nuevo registro y no hay ningun ctegory_group_id seleccionado porque no existe aun el registro --}}
            @foreach ($categoryGroups as $categoryGroup)
                <option value="{{ $categoryGroup->id }}"> {{ $categoryGroup->name }} </option>
            @endforeach
        @else
            {{-- Si no es create entonces la unica opcion que queda es edit... en caso que hayan mas opciones se tendría que hacer mas if validando, aqui no aplica, solo tenemos 2 posibles valores 'create' y 'edit' --}}
            {{-- primero validamos que $category exista sino marcará error la siguiente consulta a $category->category_group_id aunque en teoria deberia estár mas que validado
                por la variable que mande al formulario determinando que accion hacemos, si create o edit --}}
            @isset($category)
                @foreach ($categoryGroups as $categoryGroup)
                    {{-- Necesitamos recuperar el id del category_group_id que tiene este elemento y marcarlo como seleccionado cuando el form sea edit --}}
                    <option value="{{ $categoryGroup->id }}"
                        {{ $category->category_group_id == $categoryGroup->id ? 'selected' : '' }}>
                        {{ $categoryGroup->name }} </option>
                @endforeach
            @endisset
        @endif

    </select>
    @error('category_group_id')
        <p class="validation-message">{{ $message }}</p>
    @enderror
</div>

<input type="submit" value="Añadir" class="button button-with success">
