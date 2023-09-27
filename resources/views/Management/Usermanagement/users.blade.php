@extends('layouts.app')


@section('content')

<a href="{{ route('user.create')}}" class="btn btn-primary">ADD</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Borrowling limit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @switch($user->role_id)
                    @case(2)
                            Admin
                            @break
                    @case(3)
                            User
                            @break
                    @default
                        
                @endswitch
            </td>
            <td>{{ $user->borrowing_limit }}</td>

            <td>
                <a href="{{ route('user.details', $user->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection