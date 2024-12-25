<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/dashboard', function () {
    return view('afterLogin');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/api/genres', [GenreController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
