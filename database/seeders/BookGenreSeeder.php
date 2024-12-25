<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class BookGenreSeeder extends Seeder
{
    public function run()
    {
        $books = Book::all();
        $genres = Genre::all();

        foreach ($books as $book) {
            $book->genres()->attach(
                $genres->random(2)->pluck('id')->toArray() // Melampirkan 2 genre secara acak ke setiap buku
            );
        }
    }
}
