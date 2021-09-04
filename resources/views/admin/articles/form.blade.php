<div class="article-form row">
    <div class="main-form {{ $action == 'edit' ? 'col-9' : 'col-12' }}">
        <div class="form__group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="input @error('name') is-invalid @enderror"
                value="{{ isset($article->name) ? $article->name : old('name') }}">
            @error('name')
                <p class="validation-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="author">Autor</label>
            <input type="text" name="author" id="author" class="input @error('author') is-invalid @enderror"
                value="{{ isset($article->author) ? $article->author : old('author') }}">
            @error('author')
                <p class="validation-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="category_id">Categoría</label>
            <select name="category_id" id="category_id" class="input @error('category_id') is-invalid @enderror">
                <option value="0">Asigne una categoría</option>
                @if ($action == 'create')
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @else
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->category_group_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }} </option>
                    @endforeach

                @endif
            </select>
            @error('category_id')
                <p class="validation-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">
            @if ($action == 'create')
                <img width="100px" src="" alt="">
            @else
                <img width="100px"
                    src="{{ strpos($article->image, 'http') !== false ? $article->image : asset('storage') . '/' . $article->image }}"
                    alt="">
            @endif
            @error('image')
                <p class="validation-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            @if ($action == 'create')
                <textarea class="ckeditor form-control @error('description') is-invalid @enderror" name="description"
                    id="description">{{ isset($article->description) ? $article->description : old('description') }}</textarea>
            @else
                <textarea class="ckeditor form-control" name="description"
                    id="description">{{ $article->description }}</textarea>

            @endif
            @error('description')
                <p class="validation-message">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" value="Guardar" class="button button-with success">
    </div>

    @if ($action == 'edit')
        <div class="aside-form col-3">
            <h5 class="text-center">Comentarios</h5>
            <div id="list-comments">
            </div>
        </div>
    @endif
</div>

@section('javascript')
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

    @if ($action == 'edit')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/admin/comments.js') }}"></script>
    @endif
@endsection
