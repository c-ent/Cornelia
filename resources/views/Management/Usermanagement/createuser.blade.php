@extends('layouts.app')


@section('content')
<form action=" {{ route('user.store') }}" method="post">
    @csrf
    <div>
        <label for="name"> User Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="email">User EMail</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="password">User password</label>
        <input type="text" name="password">
    </div>

    <div>
        <label for="Role">Role</label>
        <select type="dropdown" name="role">
            <option value="2">Admin</option>
            <option value="3">User</option>
        </select>
    </div>

    <div>
        <label for="borrowing_limit">Borowing limit</label>
        <input type="number" name="borrowing_limit" value="10">
    </div>
    <div></div>
        <input type="submit" value="Submit">
    </div>
</form>


@if ($errors->has('email'))
    <div>
        {{ $errors->first('email') }}
    </div>
@endif


@if ($errors->has('password'))
    <div>
        {{ $errors->first('password') }}
    </div>
@endif

@if ($errors->has('role'))
    <div>
        {{ $errors->first('role') }}
    </div>
@endif



@endsection