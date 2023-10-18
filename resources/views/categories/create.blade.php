<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <p>

        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p>Error: {{ $message }}</p>
        @enderror
    </p>
    <p>
        <button type="submit">Guadar</button>
    </p>

</form>