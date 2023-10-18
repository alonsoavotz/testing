<form action="{{ route('categories.update', $category->id) }}" method="post">
    @csrf
    @method('put')
    <p>

        <input type="text" name="name" value="{{ $category->name }}">
        @error('name')
            <p>Error: {{ $message }}</p>
        @enderror
    </p>
    <p>
        <button type="submit">Guadar</button>
    </p>

</form>