@foreach ($categories as $category)
    <p>{{ $category->name }}</p>
    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endforeach