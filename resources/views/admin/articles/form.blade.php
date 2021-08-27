<div class="article-form row">
    <div class="main-form {{ $action == 'edit' ? 'col-9' : 'col-12' }}">
        <div class="form__group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="input"
                value="{{ isset($article->name) ? $article->name : old('name') }}">
        </div>

        <div class="form__group">
            <label for="author">Autor</label>
            <input type="text" name="author" id="author" class="input"
                value="{{ isset($article->author) ? $article->author : old('author') }}">
        </div>

        <div class="form__group">
            <label for="author">Categoría</label>
            <select name="category_id" id="category_id" class="input">
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
        </div>

        <div class="form__group">
            <label for="image">Autor</label>
            <input type="file" name="image" id="image">
            @if ($action == 'create')
                <img width="100px" src="" alt="">
            @else
                <img width="100px" src="{{ asset('storage') . '/' . $article->image }}" alt="">
            @endif

        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            @if ($action == 'create')
                <textarea class="ckeditor form-control" name="description" id="description"></textarea>
            @else
                <textarea class="ckeditor form-control" name="description"
                    id="description">{{ $article->description }}</textarea>
            @endif
        </div>

        <input type="submit" value="Guardar" class="button button-with success">
    </div>

    @if ($action == 'edit')
        {{-- Esta sección solo será mostrada cuando se abra e formulario para la accion de editar, en create no se renderizará nada de aqui --}}
        {{-- Esta sección será cargada y gestionada con Ajax o Axios, por lo que tendrás que crear un enpoint tipo API REST para consumirlo sin que recargue la pagina --}}
        <div class="aside-form col-3">
            <h5 class="text-center">Comentarios</h5>
            {{-- List template --}}

            <div id="list-comments">
                {{-- Se autollena --}}
            </div>
        </div>
    @endif
</div>

@section('javascript')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

    {{-- Solo cargar este script si se abre el formulario de editar --}}
    @if ($action == 'edit')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const article_id = {{ $article->id }};

            const updateCommentList = () => {
                axios({
                    method: 'get',
                    url: `/api/comentarios/${article_id}/noticia`,
                }).then((response) => {

                    let listRowText = '';
                    const element = document.getElementById('list-comments');

                    if (response.data[0].comments == 0) {
                        listRowText += `<p class="text-center">No hay comentarios</p>`;
                        element.innerHTML = listRowText;
                    } else {
                        response.data[0].comments.forEach(item => {
                            listRowText += `
                            <li class="list-group-item d-flex comments__list">
                                <span>
                                    ${item.message}
                                </span>
                                <div class="actions">
                                    <button onclick="banComment('${item.id}');" style="background: ${item.is_banned === 1 ? '#c91b1b' : '#259b39'}; color: white; height: max-content;" class="button">
                                        ${ item.is_banned === 1 ? 'Unban' : 'Ban' }
                                    </button>
                                </div>
                            </li>
                        `;
                        });

                        element.innerHTML = listRowText;
                    }
                });
            }

            updateCommentList();

            const banComment = (comment_id) => {
                event.preventDefault();
                axios({
                    method: 'get',
                    url: `/api/comentarios/${comment_id}/ban`,
                }).then((response) => {
                    console.log(response.data);
                    updateCommentList();
                });
            }
        </script>
    @endif
@endsection
