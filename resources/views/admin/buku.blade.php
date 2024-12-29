<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Admin Panel</title>
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                <input type="text" id="search-input" placeholder="Cari judul, penulis, atau genre..." autocomplete="off" />
            </form>
            <a href="{{ route('admin.buku.create') }}" class="btn btn-primary add-book-btn">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>
        

        <!-- Book Table -->
        <table class="book-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Publisher</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="book-table-body">
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            @foreach ($book->genres as $genre)
                                {{ $genre->name_genre }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->available_copies }}</td>
                        <td>
                            <a href="{{ route('admin.buku.edit', $book->id) }}" class="action-btn edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.buku.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
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
                    const tableBody = document.getElementById('book-table-body');
                    tableBody.innerHTML = ''; // Hapus konten tabel lama
    
                    if (data.books.length > 0) {
                        data.books.forEach(book => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${book.title}</td>
                                <td>${book.author}</td>
                                <td>${book.genres.map(genre => genre.name_genre).join(', ')}</td>
                                <td>${book.publisher}</td>
                                <td>${book.available_copies}</td>
                                <td>
                                    <a href="/admin/buku/edit/${book.id}" class="action-btn edit-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="/admin/buku/destroy/${book.id}" method="POST" style="display:inline;">
                                        <button type="submit" class="action-btn delete-btn">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Tidak ada data buku.</td></tr>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    
</body>

</html>
