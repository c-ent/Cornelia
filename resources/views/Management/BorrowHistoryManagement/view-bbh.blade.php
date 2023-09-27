@extends('layouts.app')


@section('content')

<div>
            <h5>{{ $bbh->id }}</h5>
            <h5>{{ $bbh->user->name }}</h5> 
            <h5>{{ $bbh->book->id }}</h5>
            <h5>{{ $bbh->borrow_date }}</h5>
            <h5>{{ $bbh->return_date }}</h5>
            <h5>{{ $bbh->status }}</h5>
    {{-- <a href="/edit/{{$todos->id}}"><span class="btn btn-primary">Edit</span></a>
    <a href="/delete/{{$todos->id}}"><span class="btn btn-danger">Delete</span></a> --}}
</div>

@endsection