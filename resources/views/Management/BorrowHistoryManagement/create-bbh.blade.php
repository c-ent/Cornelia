@extends('layouts.app')


@section('content')
<form action=" {{route('bbh.store')}}" method="post">
    @csrf
    <div>
        <label for=""> Id of borrower</label>
        <input type="id" name="borrower"  >
    </div>
    <div>
        <label for="">Id of Book Borrowed</label>
        <input type="id" name="bookborrowed" >
    </div>
    <div>
        <label for="">Date Borrowed</label>
        <input type="date" name="dateborrowed"  >
    </div>
    <div>
        <label for="">Date Returned</label>
        <input type="date" name="datereturned">
    </div>
    <div>
        <label for="">Borrow Status</label>
        <select type="status" name="borrowstatus">
            <option value="borrowed">Borrowed</option>
            <option value="returned">Returned</option>
        </select>
    </div>

    <div></div>
        <input type="submit" value="Submit">
    </div>
</form>


@if ($errors->has('borrower'))
    <div>
        {{ $errors->first('borrower') }}
    </div>
@endif


@if ($errors->has('bookborrowed'))
    <div>
        {{ $errors->first('bookborrowed') }}
    </div>
@endif

@if ($errors->has('dateborrowed'))
    <div>
        {{ $errors->first('dateborrowed') }}
    </div>
@endif

@if ($errors->has('datereturned'))
    <div>
        {{ $errors->first('datereturned') }}
    </div>
@endif

@if ($errors->has('borrowstatus'))
    <div>
        {{ $errors->first('borrowstatus') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@endsection