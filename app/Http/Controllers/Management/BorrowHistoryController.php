<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowHistory;

class BorrowHistoryController extends Controller
{
    public function index()
    {
       
    }

    public function borrowhistory()
    {
        $bbh = BorrowHistory::all();


        $userNames = [];
        $bookTitles = [];

        // Loop through each bbh record to retrieve user and book data
        foreach ($bbh as $borrowHistory) {
            // Retrieve the associated user's name
            $userName = $borrowHistory->user->name;

            // Retrieve the associated book's title
            $bookTitle = $borrowHistory->book->title;

            $userNames[] = $userName;
            $bookTitles[] = $bookTitle;
    }
        return view('Management.BorrowHistoryManagement.bbh', compact('bbh','userNames','bookTitles'));
    }

    public function details(BorrowHistory $id)
    {
       ;
        return view('Management.BooksManagement.view-bbh', ['bbh' => $id]);
    }

    public function create()
    {
        return view('Management.BooksManagement.createbbh');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'isbn' => 'required|integer',
            'copies' => 'required|integer',
        ]);

        BorrowHistory::create([
            'title' => $credentials['title'],
            'author' => $credentials['author'],
            'description' => $credentials['description'],
            'isbn' => $credentials['isbn'],
            'copies' => $credentials['copies'],
        ]);

        session()->flash('success', 'Book created successfully');
        return redirect('/manage/books');
    }

    public function edit(Book $id)
    {   
        return view('Management.BooksManagement.editbook', ['book' => $id]);
    }

    public function update(Request $request, Book $id)
    {
        $credentials = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'isbn' => 'required|integer',
            'copies' => 'required|integer',
        ]);

        $id->update([
            'title' => $credentials['title'],
            'author' => $credentials['author'],
            'description' => $credentials['description'],
            'isbn' => $credentials['isbn'],
            'copies' => $credentials['copies'],
        ]);

        session()->flash('success', 'User updated successfully');
        return redirect('/manage/books');
    }

    public function delete(Book $id)
    {
        $id->delete();
        return redirect('/manage/books');
    }
}
