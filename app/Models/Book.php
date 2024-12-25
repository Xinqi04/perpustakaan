<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'published_year',
        'publisher',
        'available_copies',
        'total_copies',
        'synopsis',
        'price',
        'book_image',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}
