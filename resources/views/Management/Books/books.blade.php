@extends('layouts.app')
@section('content')


<div class="w-100 my-4" style="background-color:#ECECEC;padding:30px;border-radius:20px">

    <h1 class="fs-2 fw-bold my-3">All Books</h1>
    <div class="d-flex my-5">
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

    
    <div class="book-grid">
        @foreach ($books as $book)
        <a href="{{ route('book.view', $book->id)}}" class="book">
            <!-- You can insert the book cover here -->
            <img src="{{asset('img/book-cover.png') }}" alt="{{ $book->title }}">
    
            <div class="book-info">
                <h3 class="book-title">{{ $book->title }}</h3>
                <p class="book-author">{{ $book->author }}</p>
            </div>
    
            {{-- <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                @csrf
                <!-- Add form inputs or buttons here -->
                <button class="borrow-btn" type="submit">Borrow</button>
            </form> --}}
        </a>
        @endforeach
    </div>
    
    
    
    
    {{-- <div style="font-size:12px">
        {{ $books->links('pagination::default') }}
    </div> --}}

</div>





@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection