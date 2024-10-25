@extends('dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Review</h2>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="review_text" class="block mb-2">Review Text:</label>
            <input type="text" name="review_text" id="review_text" value="{{ $review->review_text }}" required class="border rounded px-2 py-1 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Update Review</button>
    </form>

    <a href="{{ route('books.show', $review->book_id) }}" class="text-blue-500 hover:underline">Back to Book</a>
@endsection
