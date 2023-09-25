<a href="{{ route('book.create')}}" class="btn btn-primary">ADD</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>ISBN</th>
            <th>No. of Copies</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->isbn }}</td>
            <td>{{ $book->copies }}</td>

            <td>
                <a href="{{ route('book.details', $book->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>