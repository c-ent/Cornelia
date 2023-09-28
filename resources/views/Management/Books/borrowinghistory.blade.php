@extends('layouts.app')
@section('content')

<div class="w-100 my-4" style="background-color:white;padding:30px;border-radius:20px">

    <div class="d-flex">
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

    <h1 class="fs-2 fw-bold my-4">Borrowing History</h1>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Borrow Date</th>
                <th>Returned Date</th>
                <th>Borrow Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowedBooks as $book)
            <tr>
                <td class="bookid">{{ $book->id }}</td>
                <td class="booktitle">{{ $book->book->title }}</td>
                <td class="booktitle">{{ $book->book->author }}</td>
                <td class="booktitle">{{ $book->borrow_date }}</td>
                <td class="booktitle">{{ $book->return_date }}</td>
                <td class="bookcopies">{{ $book->borrow_status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div style="font-size:12px">
        {{ $books->links('pagination::default') }}
    </div> --}}

</div>
@endsection