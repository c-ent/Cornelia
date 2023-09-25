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
                <a href="{{ route('book.borrow', $book->id) }}" class="btn btn-primary">Borrow</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>