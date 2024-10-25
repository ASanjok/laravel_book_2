<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        Book::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'author_id' => Auth::id(), 
        ]);

        return redirect()->route('books')->with('success', 'Книга успешно добавлена!');
    }
    
    public function index()
    {
        $books = Book::withCount('reviews')->get(); 
        
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with('reviews')->findOrFail($id);

        return view('books.show', compact('book'));
    }
}


