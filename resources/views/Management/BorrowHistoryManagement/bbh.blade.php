@extends('layouts.app')


@section('content')

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
            <td>{{ $bbh->user->name }}</td> 
            <td>{{ $bbh->book->id }}</td>
            <td>{{ $bbh->borrow_date }}</td>
            <td>{{ $bbh->return_date }}</td>
            <td>{{ $bbh->borrow_status }}</td>

            <td>
                <a href="{{ route('bbh.details', $bbh->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('bbh.edit', $bbh->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('bbh.delete', $bbh->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{--$bbh is a BorrowHistory record.
    $bbh->user is the user associated with that record.
    $bbh->user->name is the name of the user who made the borrowing represented by $bbh. 
--}}

@endsection