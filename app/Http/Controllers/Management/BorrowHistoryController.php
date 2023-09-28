<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BorrowHistory;
use App\Models\Book;

class BorrowHistoryController extends Controller
{
    public function index()
    {
       //
    }

    //Display the Borrow History
    public function borrowhistory()
    {
        $bbh = BorrowHistory::all();
        return view('Management.BorrowHistoryManagement.bbh', compact('bbh'));
    }

    //Display the Borrow History
    public function allreturnedBooks()
    {
        $bbh = BorrowHistory::where(function($query) {
            $query->where('borrow_status', 'Returned')
                    ->orWhereNotNull('return_date');
        })->get();
        return view('Management.BorrowHistoryManagement.bbh-returned', compact('bbh'));
    }

    public function allborrowedBooks()
    {
        $bbh = BorrowHistory::where(function($query) {
            $query->where('borrow_status', 'Borrowed')
                    ->orWhereNull('return_date');
        })->get();
        return view('Management.BorrowHistoryManagement.bbh-borrowed', compact('bbh'));
    }

    //Display the Detail of a single bbh
    public function details(BorrowHistory $id)
    {
        return view('Management.BorrowHistoryManagement.view-bbh', ['bbh' => $id]);
    }

    //Return the view for creation of bbh
    public function create()
    {
        return view('Management.BorrowHistoryManagement.create-bbh');
    }

    //Return the view for edit of bbh
    public function edit(BorrowHistory $id)
    {   
        return view('Management.BorrowHistoryManagement.edit-bbh', ['bbh' => $id]);
    }


    //!Storing the created bbh
    public function store(Request $request)
    {
        $request->validate($this->validationRules(), $this->validationMessages()); //Validation
        // Check if the book is being returned and update 'borrowstatus'
        $this->setBorrowStatus($request);
        $book = Book::find($request->input('bookborrowed'));
        if ($book->copies <= 0) {
            return redirect()->back()->with('error', 'No available copies of the selected book');
        }
        $book->decrement('copies');

        BorrowHistory::create([
            'user_id' => $request->input('borrower'),
            'book_id' => $request->input('bookborrowed'),
            'borrow_date' => $request->input('dateborrowed'),
            'return_date' => $request->input('datereturned'),
            'borrow_status' => $request->input('borrowstatus'),
        ]);
        session()->flash('success', 'Borrow history created successfully');
        return redirect('/manage/bbh');
    }

      //!Updating the edited bbh
    public function update(Request $request, BorrowHistory $id)
    {
        $request->validate($this->validationRules(), $this->validationMessages());
        $oldBorrowStatus = $id->borrow_status;
        // Check if the book is being returned and update 'borrowstatus'
        $this->setBorrowStatus($request);
        $book = Book::find($request->input('bookborrowed'));
        if ($book->copies <= 0) {
            return redirect()->back()->with('error', 'No available copies of the selected book');
        }
        $id->update([
            'user_id' => $request->input('borrower'),
            'book_id' => $request->input('bookborrowed'),
            'borrow_date' => $request->input('dateborrowed'),
            'return_date' => $request->input('datereturned'),
            'borrow_status' => $request->input('borrowstatus'),
        ]);
        // Compare old and new status and adjust book copies accordingly
        $this->adjustBookCopies($request, $oldBorrowStatus);

        session()->flash('success', 'bbh updated successfully');
        return redirect('/manage/bbh');
    }

    //!Deleting the bbh
    public function delete(BorrowHistory $id)
    {
        $id->delete();
        return redirect()->back();
    }



    //Validation Rules
    private function validationRules()
    {
    return [
        'borrower' => 'required|exists:users,id',
        'bookborrowed' => 'required|exists:books,id',
        'dateborrowed' => 'required',
        'datereturned' => 'nullable',
        'borrowstatus' => 'required',
    ];
    }

    private function validationMessages()
    {
    return [
        'borrower.exists' => 'The selected user does not exist',
        'bookborrowed.exists' => 'The selected book does not exist',
    ];
    }

private function adjustBookCopies(Request $request, $oldBorrowStatus)
{
    if ($oldBorrowStatus !== $request->input('borrowstatus')) {
        $book = Book::find($request->input('bookborrowed'));
        if ($request->input('borrowstatus') === 'Returned') {
            $book->increment('copies');
        } else {
            $book->decrement('copies');
        }
    }
}

private function setBorrowStatus(Request $request)
{
    if ($request->input('datereturned') !== null) {
        $request->merge(['borrowstatus' => 'Returned']);
    } else {
        $request->merge(['borrowstatus' => 'Borrowed']);
    }
}



//?FOR USERS
public function books()
{
    $books = Book::all();
    // $books = Book::paginate(10);
    $borrowedBooks = BorrowHistory::where('user_id', auth()->user()->id)
    ->where('borrow_status', 'Borrowed')
    ->get();

    return view('Management.Books.books', compact('books','borrowedBooks'));
  
}


public function borrowBook( Book $id)
{
    $book = $id;
    if (!$book) {
        return redirect()->back()->with('error', 'The selected book does not exist');
    }

    if ($book->copies <= 0) {
        return redirect()->back()->with('error', 'No available copies of the selected book');
    }

    $total_borrowed = BorrowHistory::where('user_id', auth()->user()->id)
    ->where('borrow_status', 'Borrowed')
    ->get();

    $borrowed_limit = auth()->user()->borrowing_limit;

    if ($total_borrowed->count() >= $borrowed_limit) {
        return redirect()->back()->with('error', 'You have reached the maximum number of books that can be borrowed');
    }

  
    // Create a new BorrowHistory entry for the user
    BorrowHistory::create([
        'user_id' => auth()->user()->id,
        'book_id' => $book->id,
        'borrow_date' => now(),
        'return_date' => null,
        'borrow_status' => 'Borrowed',
    ]);

    // Decrement the book copies
    $book->decrement('copies');

    return redirect()->back()->with('success', 'Book borrowed successfully');
}



public function returnBook(Request $request, Book $bookId, BorrowHistory $borrowedId)
{
    $borrowedId->update([
        'return_date' => now(),
        'borrow_status' => 'Returned',
    ]);

    // Increment the book copies
    $bookId->increment('copies');

    return redirect()->back()->with('success', 'Book returned successfully');
}

public function userbbh(Request $request, Book $bookId, BorrowHistory $borrowedId)
{
    $userId = auth()->user()->id;

    $borrowedBooks = BorrowHistory::where('user_id', $userId)
        ->where('borrow_status', 'Returned')
        ->get();

    // Increment the book copies

    return view('Management.Books.borrowinghistory', compact('borrowedBooks'));
}




}
