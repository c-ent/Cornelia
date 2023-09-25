<a href="{{ route('bbh.create')}}" class="btn btn-primary">ADD</a>
<table class="table">
    <thead>
        <tr>
            <th>BBH ID</th>
            <th>User ID</th>
            <th>Book ID</th>
            <th>Borrowed Date</th>
            <th>Returned Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bbh as $bbh)
        <tr>
            <td>{{ $bbh->id }}</td>
            <td>{{ $userNames[$loop->index]  }}</td>
            <td>{{  $bookTitles[$loop->index] }}</td>
            <td>{{ $bbh->borrow_date }}</td>
            <td>{{ $bbh->return_date }}</td>
            <td>{{ $bbh->status }}</td>

            <td>
                {{-- <a href="{{ route('book.details', $book->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>