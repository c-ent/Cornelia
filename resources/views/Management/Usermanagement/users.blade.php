@extends('layouts.app')
@section('content')

<div class="d-flex flex-row">
    <h1  class="fs-1 fw-bold ">User Management</h1>
    <a  href="{{ route('user.create')}}" class="addbtn ms-auto"type="submit">
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

    <h1 class="fs-2 fw-bold my-4">All Users</h1>
<table class="table table-borderless">
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
                <a href="{{ route('user.details', $user->id) }}">
                    <i class="bi bi-eye-fill" style="color:#4E9C84;font-size:30px"></i>
                </a>
                
                <a href="{{ route('user.edit', $user->id)  }}"> 
                    <i class="bi bi-pencil-fill" style="color:#4E9C84;font-size:30px"></i>
                </a>
                <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> <i class="bi bi-trash-fill" style="color:#4E9C84;font-size:30px"></i></button>
                </form>
            </td>

          
        </tr>
        @endforeach
    </tbody>
</table>

@endsection