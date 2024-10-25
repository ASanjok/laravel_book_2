<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'review_text' => 'required|string|max:255', 
        ]);

        Review::create([
            'review_text' => $request->input('review_text'), 
            'book_id' => $bookId,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('books.show', $bookId)->with('success', 'Review added successfully!');
    }
    public function edit(Review $review)
    {
        
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'You are not authorized to edit this review.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'You are not authorized to update this review.');
        }

        
        $request->validate([
            'review_text' => 'required|string|max:255',
        ]);

        
        $review->update([
            'review_text' => $request->input('review_text'),
        ]);

        return redirect()->route('books.show', $review->book_id)->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'You are not authorized to delete this review.');
        }

        
        $review->delete();

        return redirect()->route('books.show', $review->book_id)->with('success', 'Review deleted successfully!');
    }
}
