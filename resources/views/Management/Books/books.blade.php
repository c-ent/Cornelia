@extends('layouts.app')


@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>ISBN</th>
            <th>Copies</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->isbn}}</td>
            <td>{{ $book->copies}}</td>

            <td>
                <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                    @csrf
                    <!-- Add form inputs or buttons here -->
                    <button type="submit">Borrow Book</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<table class="table">
    <thead>
        <tr>
            <th>BBH ID</th>
            <th>user iod</th>
            <th>book id</th>
            <th>biorrow date</th>
            <th>return date</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowedBooks as $borrowedBook)
        <tr>
            <td>{{ $borrowedBook->id }}</td>
            <td>{{ $borrowedBook->user->name }}</td>
            <td>{{ $borrowedBook->book->title }}</td>
            <td>{{ $borrowedBook->borrow_date }}</td>
            <td>{{ $borrowedBook->return_date }}</td>
            <td>{{ $borrowedBook->borrow_status }}</td>

            <td>
                <form method="POST" action="{{ route('book.return', ['bookId' => $borrowedBook->book->id, 'borrowedId' => $borrowedBook->id]);}}">
                    @csrf
                    <!-- Add form inputs or buttons here -->
                    <button type="submit">Return Book</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection