@extends('layouts.app')
@section('content')

<h1>Books</h1>

<div class="d-flex w-100 my-4">
    <div class="w-50 position-relative">
        <input class="search" type="text" placeholder="Search" name="search">
    </div>
    {{-- <div>
        Filters
    </div>

    <div>
        Sort By
    </div> --}}
</div>

<h1>Available Books</h1>
<table class="table ">
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
        @foreach ($books as $index => $book)
        <tr class="{{ $index % 2 == 0 ? 'table-success' : '' }}">
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




<h1>Your Borrowed Books</h1>
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
        @foreach ($borrowedBooks as $index => $borrowedBook)
        <tr class="{{ $index % 2 == 0 ? 'table-success' : '' }}">
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