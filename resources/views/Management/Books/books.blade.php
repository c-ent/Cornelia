@extends('layouts.app')
@section('content')

<h1  class="fs-1 fw-bold">Books</h1>

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

    <h1 class="fs-2 fw-bold my-4">Available Books</h1>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>ISBN</th>
                <th>Copies</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $index => $book)
            <tr>
                <td class="bookid">{{ $book->id }}</td>
                <td class="booktitle">{{ $book->title }}</td>
                <td class="bookauthor">{{ $book->author }}</td>
                <td class="bookdescr">{{ $book->description }}</td>
                <td class="bookisbn">{{ $book->isbn}}</td>
                <td class="bookcopies">{{ $book->copies}}</td>

                <td>
                    <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                        @csrf
                        <!-- Add form inputs or buttons here -->
                        <button class="borrowbtn"type="submit">Borrow</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div style="font-size:12px">
        {{ $books->links('pagination::default') }}
    </div> --}}

</div>


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
    <h1  class="fs-2 fw-bold my-4">Your Borrowed Books</h1>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>BBH ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Borrow Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowedBooks as $index => $borrowedBook)
        <tr>
            <td class="bookid">{{ $borrowedBook->id }}</td>
            <td class="booktitle">{{ $borrowedBook->book->title }}</td>
            <td class="bookauthor">{{ $borrowedBook->book->author }}</td>
            <td class="bookdescr">{{ $borrowedBook->book->description }}</td>
            <td class="bookbrwdate">{{ $borrowedBook->borrow_date }}</td>
           

            <td>
                <form method="POST" action="{{ route('book.return', ['bookId' => $borrowedBook->book->id, 'borrowedId' => $borrowedBook->id]);}}">
                    @csrf
                    <!-- Add form inputs or buttons here -->
                    <button class="returnbtn"type="submit">Return</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>


@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection