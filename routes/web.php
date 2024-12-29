<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/dashboard', function () {
    $books = Book::take(9)->inRandomOrder()->get(); // Ambil 9 buku secara acak
    return view('afterLogin', ['books' => $books]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/news', [NewsController::class, 'showNews']);

Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user', [AdminController::class, 'dataUser'])->name('admin.dataUser');

    // Route for viewing loans
    Route::get('/admin/loans', [AdminController::class, 'transaksi'])->name('admin.loans');

    // Route for updating loan status
    Route::patch('/admin/loans/{loan}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');

    // Route untuk buku
    Route::prefix('/buku')->group(function () {
        Route::get('/', [BookController::class, 'index2'])->name('admin.dataBuku');
        Route::get('/create', [BookController::class, 'create'])->name('admin.buku.create');
        Route::post('/', [BookController::class, 'store'])->name('admin.buku.store');
        Route::get('/{id}/edit', [BookController::class, 'edit'])->name('admin.buku.edit');
        Route::put('/{id}', [BookController::class, 'update'])->name('admin.buku.update');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('admin.buku.destroy');
    });
});


// Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/api/genres', [GenreController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::middleware('auth')->group(function () {
    Route::get('/katalogBuku', [BookController::class, 'index'])->name('books.index');;
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/pinjambuku', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/pinjambuku', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/transactions', [LoanController::class, 'userLoan'])->name('user.transactions');
});

require __DIR__.'/auth.php';
