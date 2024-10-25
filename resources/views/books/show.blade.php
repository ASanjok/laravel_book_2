@extends('dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">{{ $book->title }}</h2>

<div class="mb-4">
    <strong>Text:</strong>
    <p>{{ $book->text }}</p>
</div>

<div class="mb-4">
    <strong class="flex justify-between items-center">
        Reviews
        <form action="{{ route('reviews.store', $book->id) }}" method="POST" class="flex">
            @csrf
            <input type="text" name="review_text" placeholder="Add a review..." required class="border rounded px-2 py-1">
            <button type="submit" class="bg-blue-500 text-black rounded px-2 py-1 ml-2">Submit</button>
        </form>
    </strong>
    <ul>
        @foreach($book->reviews as $review)
        <li>
            {{ $review->review_text }}
            @if ($review->user_id === Auth::id())
            <a href="{{ route('reviews.edit', $review->id) }}" style="color: blue">Edit</a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" style="color: red"class="hover:underline">Delete</button>
            </form>
            @endif
            <hr style="border: 1px solid black;">
        </li>
        @endforeach
    </ul>
</div>

<a href="{{ route('books') }}" class="text-primary">Back to Books</a>
@endsection