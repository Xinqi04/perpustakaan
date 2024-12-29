<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Perpustakaan Online</title>
    @laravelPWA
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/buku2.css', 'resources/js/wishlistbuku.js'])
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <!-- Logo dan Teks -->
                <div class="logo d-flex align-items-center ms-3">
                    <img alt="Library Logo" height="50" src="{{ asset('../images/emojione_books.png') }}" width="50" class="me-3" />
                    <span class="fw-bold" style="color: #3b82f6;">Perpustakaan Online</span>
                </div>

                <!-- Tombol Hamburger untuk Menu Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu Offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="fw-bold" style="color: #3b82f6;" id="offcanvasNavbarLabel">Perpustakaan Online</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}?verified=1">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/news') }}">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/katalogBuku') }}">Katalog Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist Buku</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; text-decoration: none;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="content" style="padding-top: 80px">
        <p style="text-align: center; font-size: 40px; font-weight: bold;">Wishlist Buku</p>
    
        <!-- Pengecekan jika wishlist kosong -->
        @if ($booksInWishlist->isEmpty())
            <p style="text-align: center; font-size: 18px; color: #888;">Belum ada wishlist buku</p>
        @else
            <!-- Book Cards -->
            <div id="book-cards" class="row">
                @foreach ($booksInWishlist as $book)
                <div class="col-md-2 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $book->book_image) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Penulis:</strong> {{ $book->author }}</p>
                            <p class="card-text"><strong>Kategori:</strong> 
                                @foreach ($book->genres as $genre)
                                    {{ $genre->name_genre }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                            <!-- Tombol Lepas Wishlist -->
                            <div class="pinjam">
                                <a href="{{ route('loans.create', ['user_id' => auth()->user()->id, 'book_id' => $book->id]) }}">
                                    <button type="button">Pinjam Buku</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
    
</body>

</html>