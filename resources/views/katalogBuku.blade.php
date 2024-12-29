<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="buku.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/buku2.css', 'resources/js/afterlogin.js'])
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
    <!-- Content -->
    <div class="content" style="padding-top: 80px">
        <p style="text-align: center; font-size: 40px; font-weight: bold;">Katalog Buku</p>


        <!-- Search and Add Book -->
        <div class="action-bar">
            <form action="{{ route('admin.dataBuku') }}" method="GET" class="search-form">
                <input type="text" id="search-input" class="form-control" placeholder="Cari judul, penulis, atau genre..." autocomplete="off" />
            </form>
        </div>

        <!-- Book Cards -->
        <div id="book-cards" class="row">
            @foreach ($books as $book)
                <div class="col-md-2 mb-4">
                    <div class="card shadow-sm">
                        <a href="/books/{{ $book->id }}" style="text-decoration: none; color: inherit;">
                        <img src="{{ asset('storage/' . $book->book_image) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Penulis:</strong> {{ $book->author }}</p>
                            <p class="card-text"><strong>Kategori:</strong> 
                                @foreach ($book->genres as $genre)
                                    {{ $genre->name_genre }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                            <p class="card-text"><strong>Publisher:</strong> {{ $book->publisher }}</p>
                            <p class="card-text"><strong>Stok:</strong> {{ $book->available_copies }}</p>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script>
        document.getElementById('search-input').addEventListener('input', function () {
            const query = this.value;

            fetch({{ route('admin.dataBuku') }}?search=${query}, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => response.json())
                .then(data => {
                    const cardsContainer = document.getElementById('book-cards');
                    cardsContainer.innerHTML = ''; // Hapus konten kartu lama

                    if (data.books.length > 0) {
                        data.books.forEach(book => {
                            const card = document.createElement('div');
                            card.classList.add('col-md-4', 'mb-4');
                            card.innerHTML = `
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/public/' . $book->book_image) }}" class="card-img-top" alt="${book.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${book.title}</h5>
                                        <p class="card-text"><strong>Penulis:</strong> ${book.author}</p>
                                        <p class="card-text"><strong>Kategori:</strong> ${book.genres.map(genre => genre.name_genre).join(', ')}</p>
                                        <p class="card-text"><strong>Publisher:</strong> ${book.publisher}</p>
                                        <p class="card-text"><strong>Stok:</strong> ${book.available_copies}</p>
                                        <div class="d-flex justify-content-between">
                                            <a href="/admin/buku/edit/${book.id}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="/admin/buku/destroy/${book.id}" method="POST" style="display:inline;">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            `;
                            cardsContainer.appendChild(card);
                        });
                    } else {
                        cardsContainer.innerHTML = '<div class="col-12 text-center">Tidak ada data buku.</div>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6aF0d94RtvfUAN5z7w4VZKqD3z0D+HhV8U26pXceO2dN" crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>
    <script src="{{ asset('../resources/js/afterlogin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>