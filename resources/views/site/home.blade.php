@extends('layouts.site')

@section('content')
    <h1 class="title-recent" id="title-recent">Noticias recientes</h1>
    <hr id="divider">
    <div id="recent-articles">
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/site/recentArticles.js') }}"></script>
@endsection
