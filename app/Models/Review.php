<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    protected $fillable = ['review_text', 'book_id', 'user_id']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
