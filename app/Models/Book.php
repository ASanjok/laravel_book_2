<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Связь "Один ко многим" с моделью Review (одна книга может иметь много отзывов)
    public function reviews()
    {
        return $this->hasMany(Review::class); // Связь с моделью Review
    }

    // Связь "Многие к одному" с моделью User (одна книга принадлежит одному автору)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id'); // Связь с моделью User по полю author_id
    }

    // Поля, которые могут быть заполнены
    protected $fillable = ['title', 'text', 'author_id']; // Добавляем author_id в fillable
}

