@extends('dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Books</h2>

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
