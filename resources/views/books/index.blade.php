@extends('dashboard')

@section('content')

    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
            {{ __('add book') }}
        </a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Text</th>
                <th class="py-2 px-4 border-b">Reviews</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-500 hover:underline">
                            {{ $book->title }}
                        </a>
                    </td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($book->text, 100) }}</td>
                    <td class="py-2 px-4 border-b">{{ $book->reviews_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
