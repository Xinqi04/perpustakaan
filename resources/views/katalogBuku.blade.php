<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Admin Panel</title>
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="buku.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/buku.css'])
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Hallo Admin</h2>
        <ul>
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="{{ request()->is('admin/user') ? 'active' : '' }}"><a href="{{ route('admin.dataUser') }}"><i class="fas fa-user"></i> Data User</a></li>
            <li class="{{ request()->is('admin/buku') ? 'active' : '' }}"><a href="{{ route('admin.dataBuku') }}"><i class="fas fa-book"></i> Data Buku</a></li>
            <li class="{{ request()->is('admin/transaksi') ? 'active' : '' }}"><a href="{{ route('admin.transaksi') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Data Buku</h1>

        <!-- Search and Add Book -->
        <div class="action-bar">
            <form action="{{ route('admin.dataBuku') }}" method="GET" class="search-form">
                <input type="text" id="search-input" class="form-control" placeholder="Cari judul, penulis, atau genre..." autocomplete="off" />
            </form>
            <a href="{{ route('admin.buku.create') }}" class="btn btn-primary add-book-btn">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>

        <!-- Book Cards -->
        <div id="book-cards" class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('path/to/book/image') }}" class="card-img-top" alt="{{ $book->title }}">
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
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.buku.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.buku.destroy', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('search-input').addEventListener('input', function () {
            const query = this.value;

            fetch(`{{ route('admin.dataBuku') }}?search=${query}`, {
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

</body>

</html>
