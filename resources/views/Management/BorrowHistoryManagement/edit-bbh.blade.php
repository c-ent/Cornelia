
<form action=" {{route('bbh.update', $bbh->id)}}" method="post">
    @csrf
    <div>
        <label for=""> Name of borrower</label>
        <input type="number" name="borrower"  value="{{$bbh->user_id}}">
    </div>
    <div>
        <label for="">Book Borrowed</label>
        <input type="number" name="bookborrowed" value="{{$bbh->book_id}}">
    </div>
    <div>
        <label for="">Date Borrowed</label>
        <input type="datetime-local" name="dateborrowed" value="{{$bbh->borrow_date}}">
    </div>
    
    <div>
        <label for="">Date Returned</label>
        <input type="datetime-local" name="datereturned"  value="{{$bbh->return_date}}">
    </div>
    <div>
        <label for="">Borrow Status</label>
        <select name="borrowstatus">
            <option value="borrowed" {{ $bbh->borrow_status === 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
            <option value="returned" {{ $bbh->borrow_status === 'Returned' ? 'selected' : '' }}>Returned</option>
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
