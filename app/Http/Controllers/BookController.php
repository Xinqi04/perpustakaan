<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $books = Book::with('genres');

        // Jika ada pencarian, filter berdasarkan judul, penulis, atau genre
        if ($query) {
            $books = $books->where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhereHas('genres', function ($q) use ($query) {
                    $q->where('name_genre', 'like', "%{$query}%");
                });
        }

        $books = $books->get();

        if ($request->ajax()) {
            // Return hasil pencarian dalam format JSON
            return response()->json(['books' => $books]);
        }

        // Jika bukan AJAX, kirim data ke view untuk tampilan awal
        return view('katalogBuku', compact('books'));
    }


    public function index2(Request $request)
    {
        $query = $request->get('search');
        $books = Book::with('genres');

        if ($query) {
            $books = $books->where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhereHas('genres', function ($q) use ($query) {
                    $q->where('name_genre', 'like', "%{$query}%");
                });
        }

        $books = $books->get();

        if ($request->ajax()) {
            return response()->json(['books' => $books]);
        }

        return view('admin.buku', compact('books'));
    }



    public function show($id)
    {
        // Temukan buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Tampilkan view detail buku
        return view('detailBuku', compact('book'));
    }

    public function create()
    {
        $genres = Genre::all(); // Ambil semua genre
        return view('admin.addBook', compact('genres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|digits:4',
            'publisher' => 'required|string|max:255',
            'available_copies' => 'required|integer|min:0',
            'total_copies' => 'required|integer|min:0',
            'synopsis' => 'required|string',
            'price' => 'required|numeric|min:0',
            'book_image' => 'required|image|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        // Simpan gambar buku
        $imagePath = $request->file('book_image')->store('books', 'public');
        

        // Buat data buku
        $book = Book::create([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'published_year' => $validatedData['published_year'],
            'publisher' => $validatedData['publisher'],
            'available_copies' => $validatedData['available_copies'],
            'total_copies' => $validatedData['total_copies'],
            'synopsis' => $validatedData['synopsis'],
            'price' => $validatedData['price'],
            'book_image' => $imagePath,
        ]);

        // Hubungkan dengan genre
        $book->genres()->attach($validatedData['genres']);

        return redirect()->route('admin.dataBuku')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Show the form for editing the specified book
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();

        return view('admin.editBook', compact('book', 'genres'));
    }

    // Update the specified book
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'stok' => 'required|integer',
            'book_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi file gambar buku (opsional)
            'genres' => 'required|array',  // Pastikan genre dipilih (array)
            'genres.*' => 'exists:genres,id', // Validasi genre yang dipilih ada di tabel genres
        ]);
    
        // Cari buku berdasarkan ID
        $book = Book::findOrFail($id);
    
        // Update data buku
        $book->title = $request->judul;
        $book->author = $request->penulis;
        $book->publisher = $request->publisher;
        $book->available_copies = $request->stok;
    
        // Menangani upload gambar buku jika ada
        if ($request->hasFile('book_image')) {
            $imagePath = $request->file('book_image')->store('books', 'public');
            $book->book_image = $imagePath;  // Simpan path gambar baru
        }
    
        // Simpan perubahan buku
        $book->save();
    
        // Update relasi genre (many-to-many)
        $book->genres()->sync($request->genres);  // Sync genre yang dipilih
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.dataBuku')->with('success', 'Buku berhasil diperbarui.');
    }
    

    // Delete the specified book
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('admin.dataBuku')->with('success', 'Buku berhasil dihapus.');
    }
}
