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

    <h3 class="main__subtitle">Mis noticias publicadas</h3>

    @foreach ($articles as $article)
        <div class="card__article__target">
            <div class="card__article__info">
                <div>
                    <h5 class="card__article__title">{{ $article->name }}</h5>
                </div>
                <div class="card__article__time">
                    <i class='bx bx-time-five'></i>
                    <p>{{ $article->published_at }}</p>
                </div>
            </div>
            <div class="article__btn-view">
                <a href="{{ route('noticias.show', $article->id) }}" class="button success">Ver articulo</a>
            </div>
        </div>
    @endforeach
    <div class="paginator">
        {!! $articles->links() !!}
    </div>
@endsection
