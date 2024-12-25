<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the wishlist items.
     */
    public function index()
    {
        // Ambil wishlist berdasarkan user yang sedang login
        $user = Auth::user();
        $wishlists = Wishlist::with('book')
                             ->where('user_id', $user->id)
                             ->get();

        // Ambil daftar buku dari wishlist
        $booksInWishlist = $wishlists->map(function ($wishlist) {
            return $wishlist->book;
        });

        return view('wishlist', compact('booksInWishlist'));
    }

    /**
     * Store a newly created wishlist item.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',   // Pastikan ada user yang login
            'book_id' => 'required|exists:books,id',   // Pastikan book_id valid
        ]);
        
        $exists = Wishlist::where('user_id', $request->user_id)
                      ->where('book_id', $request->book_id)
                      ->exists();

        if ($exists) {
            // Jika sudah ada, redirect dengan pesan error
            return redirect()->back()->with('error', 'Book is already in your wishlist.');
        }

        // Simpan data wishlist
        Wishlist::create([
            'user_id' => $request->user_id,   // Ambil user yang sedang login
            'book_id' => $request->book_id,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Book added to wishlist.');
    }


    /**
     * Remove the specified wishlist item.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return redirect()->back()->with('success', 'Book removed from wishlist.');
    }
}
