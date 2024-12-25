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
            'synopsis' => 'A novel about the American dream set in the Roaring Twenties.',
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
