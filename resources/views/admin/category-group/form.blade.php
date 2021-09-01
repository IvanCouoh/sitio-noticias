<div class="form__group">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="input @error('name') is-invalid @enderror"
        value="{{ isset($categoryGroup->name) ? $categoryGroup->name : old('name') }}">
    @error('name')
        <p class="validation-message">{{ $message }}</p>
    @enderror
</div>
<input type="submit" value="{{ $text }}" class="button button-with success">
