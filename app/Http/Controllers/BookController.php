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
        // Валидация входящих данных
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        // Создаем новую книгу с ID автора (текущего пользователя)
        Book::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'author_id' => Auth::id(), // Получаем ID текущего пользователя
        ]);

        // Перенаправляем пользователя на страницу со списком книг с сообщением об успехе
        return redirect()->route('books')->with('success', 'Книга успешно добавлена!');
    }
    
    public function index()
    {
        // Получаем список книг, включая их количество обзоров
        $books = Book::withCount('reviews')->get(); // reviews - связь с моделью обзоров
        
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        // Получаем книгу по её ID вместе с её отзывами
        $book = Book::with('reviews')->findOrFail($id);

        return view('books.show', compact('book'));
    }
}


