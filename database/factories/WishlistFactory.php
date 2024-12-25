<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Creates a new user
            'book_id' => Book::factory(), // Creates a new book
        ];
    }
}
