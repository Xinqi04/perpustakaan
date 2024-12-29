<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
         Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'The Great Gatsby is a compelling tale of the American dream, ambition, and betrayal, set during the Jazz Age in the 1920s. The story revolves around Jay Gatsby, a mysterious and wealthy man who throws extravagant parties in his pursuit of the unattainable Daisy Buchanan. Through the eyes of narrator Nick Carraway, the novel delves into themes of love, greed, and the disillusionment of the American dream. The narrative paints a vivid picture of a world teeming with opulence and desperation, showcasing the inevitable consequences of unchecked ambition and the fragility of human connections.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'published_year' => 1949,
            'publisher' => 'Secker & Warburg',
            'available_copies' => 8,
            'total_copies' => 40,
            'synopsis' => 'A dystopian novel set in a totalitarian regime ruled by Big Brother.',
            'price' => 120000,
            'book_image' => '1984.jpg',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'published_year' => 1960,
            'publisher' => 'J.B. Lippincott & Co.',
            'available_copies' => 12,
            'total_copies' => 45,
            'synopsis' => 'A novel set in the American South, dealing with themes of racial injustice.',
            'price' => 180000,
            'book_image' => 'to_kill_a_mockingbird.jpg',
        ]);

        Book::create([
            'title' => 'Buku A',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku B',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku C',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku D',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku E',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku F',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        Book::create([
            'title' => 'Buku G',
            'author' => 'F. Scott Fitzgerald',
            'published_year' => 1925,
            'publisher' => 'Charles Scribner\'s Sons',
            'available_copies' => 10,
            'total_copies' => 50,
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
            'price' => 150000,
            'book_image' => 'great_gatsby.jpg',
        ]);

        // Add more books as needed
    }
}
