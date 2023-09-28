@extends('layouts.app')


@section('content')

<div>
    <h5>{{ $book->id }}</h5>
    <h5>{{ $book->title }}</h5>
    <h5>{{ $book->author }}</h5>
    <h5>{{ $book->description }}</h5>
    <h5>{{ $book->isbn }}</h5>
    <h5>{{ $book->copies }}</h5>
    {{-- <a href="/edit/{{$todos->id}}"><span class="btn btn-primary">Edit</span></a>
    <a href="/delete/{{$todos->id}}"><span class="btn btn-danger">Delete</span></a> --}}

     <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                @csrf
                <!-- Add form inputs or buttons here -->
                <button class="borrow-btn" type="submit">Borrow</button>
            </form> 
</div>

@endsection