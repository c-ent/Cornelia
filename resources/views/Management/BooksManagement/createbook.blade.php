@extends('layouts.app')


@section('content')
<form action=" {{ route('book.store') }}" method="post">
    @csrf
    <div>
        <label for="name"> Book Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="author">Book Author</label>
        <input type="text" name="author">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description">
    </div>
    <div>
        <label for="isbn">ISBN</label>
        <input type="number" name="isbn">
    </div>
    <div>
        <label for="copies">Number of copies</label>
        <input type="number" name="copies">
    </div>

    <div></div>
        <input type="submit" value="Submit">
    </div>
</form>


@if ($errors->has('title'))
    <div>
        {{ $errors->first('email') }}
    </div>
@endif


@if ($errors->has('author'))
    <div>
        {{ $errors->first('author') }}
    </div>
@endif

@if ($errors->has('description'))
    <div>
        {{ $errors->first('description') }}
    </div>
@endif

@if ($errors->has('isbn'))
    <div>
        {{ $errors->first('isbn') }}
    </div>
@endif

@if ($errors->has('copies'))
    <div>
        {{ $errors->first('copies') }}
    </div>
@endif


@endsection
