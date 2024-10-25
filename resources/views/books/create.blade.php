<!-- resources/views/books/create.blade.php -->
@extends('dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add book</h2>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Book name</label>
            <input type="text" id="title" name="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="text" class="block text-sm font-medium text-gray-700">Book text</label>
            <textarea id="text" name="text" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-md">Save book</button>
        </div>
    </form>
@endsection
