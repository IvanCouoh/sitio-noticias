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
            @foreach ($categoryGroups as $categoryGroup)
                <option value="{{ $categoryGroup->id }}"> {{ $categoryGroup->name }} </option>
            @endforeach
        @else
            @isset($category)
                @foreach ($categoryGroups as $categoryGroup)
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
