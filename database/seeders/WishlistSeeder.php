<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wishlist; // Pastikan Wishlist model sudah diimpor
use App\Models\Book; // Pastikan Book model sudah diimpor
use App\Models\User; // Pastikan User model sudah diimpor

class WishlistSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan wishlist untuk user dengan ID 1
        $user = User::find(1); // Mencari user dengan ID 1

        if ($user) {
            // Menambahkan beberapa buku ke wishlist User 1
            $books = Book::take(3)->get(); // Ambil 3 buku pertama (ubah sesuai kebutuhan)

            foreach ($books as $book) {
                Wishlist::create([
                    'user_id' => $user->id, // User ID yang ditambahkan ke wishlist
                    'book_id' => $book->id, // ID buku yang ditambahkan ke wishlist
                ]);
            }
        }
    }
}
