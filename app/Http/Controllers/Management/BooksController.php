<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\BorrowHistory;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
       
    }

    public function books()
    {
        $books = Book::all();
        return view('Management.BooksManagement.books', compact('books'));
    }

    public function details(Book $id)
    {
        return view('Management.BooksManagement.viewbook', ['book' => $id]);
    }

    public function create()
    {
        return view('Management.BooksManagement.createbook');
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

        Book::create([
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
