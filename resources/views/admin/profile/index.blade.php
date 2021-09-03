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

    <div class="main__form">
        <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data"
            class="profile__container__data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="upload__image">
                <img src="{{ strpos(Auth::user()->profile, 'http') !== false ? Auth::user()->profile : asset('storage') . '/' . Auth::user()->profile }}"
                    id="profile" alt="" class="profile__image @error('image') is-invalid @enderror">
                <input type="file" name="profile">
                @error('profile')
                    <p class="validation-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="profile__data">
                <p class="card__article__title">Mis datos</p>
                <div class="form__group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="input @error('name') is-invalid @enderror"
                        value="{{ isset(Auth::user()->name) ? Auth::user()->name : old('name') }}">
                    @error('name')
                        <p class="validation-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="input @error('email') is-invalid @enderror"
                        value="{{ isset(Auth::user()->email) ? Auth::user()->email : old('email') }}">
                    @error('email')
                        <p class="validation-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="input" value="">
                </div>
                <input type="submit" value="Guardar" class="button button-with success mt-3 right">
            </div>
        </form>
    </div>
@endsection
