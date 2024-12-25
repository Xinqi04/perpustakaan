<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->input('genre');

        // Ambil semua buku jika genre tidak dipilih, atau filter berdasarkan genre
        $books = Book::when($genre, function ($query, $genre) {
            return $query->whereHas('genres', function ($query) use ($genre) {
                $query->where('name_genre', $genre);
            });
        })->with('genres')->get();

        return response()->json($books);
    }

    public function show($id)
    {
        // Temukan buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Tampilkan view detail buku
        return view('detailBuku', compact('book'));
    }
}
