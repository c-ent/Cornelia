@extends('layouts.app')
@section('content')

<div class="d-flex flex-row">
    <h1  class="fs-1 fw-bold ">Book Management</h1>
    <a  href="{{ route('book.create')}}" class="addbtn ms-auto"type="submit">
        <i class="bi bi-plus-circle-fill mx-1"></i>
        Create New
    </a>
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

    <h1 class="fs-2 fw-bold my-4">Books</h1>
    <table class="table  table-borderless">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>ISBN</th>
                <th>No. of Copies</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td class="bookid">{{ $book->id }}</td>
                <td class="booktitle">{{ $book->title }}</td>
                <td class="bookauthor">{{ $book->author }}</td>
                <td class="bookdescr">{{ $book->description }}</td>
                <td class="bookisbn">{{ $book->isbn }}</td>
                <td class="bookcopies">{{ $book->copies }}</td>

                <td>
                    <a href="{{ route('book.details', $book->id) }}">
                        <i class="bi bi-eye-fill" style="color:#4E9C84;font-size:30px"></i>
                    </a>
                    
                    <a href="{{ route('book.edit', $book->id) }}"> 
                        <i class="bi bi-pencil-fill" style="color:#4E9C84;font-size:30px"></i>
                    </a>
                    <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> <i class="bi bi-trash-fill" style="color:#4E9C84;font-size:30px"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection