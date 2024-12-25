<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = ['Fiction', 'Non-Fiction', 'Science', 'Fantasy', 'Romance'];

        foreach ($genres as $genre) {
            Genre::create(['name_genre' => $genre]);
        }
    }
}
