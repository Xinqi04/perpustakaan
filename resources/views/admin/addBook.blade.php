<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    @laravelPWA
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/tambahbuku.css'])
</head>

<body>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Judul Buku</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="author">Penulis</label>
                <input type="text" name="author" id="author" required>
            </div>
            <div>
                <label for="published_year">Tahun Terbit</label>
                <input type="number" name="published_year" id="published_year" required>
            </div>
            <div>
                <label for="publisher">Penerbit</label>
                <input type="text" name="publisher" id="publisher" required>
            </div>
            <div>
                <label for="available_copies">Stok</label>
                <input type="number" name="available_copies" id="available_copies" required>
            </div>
            <div>
                <label for="total_copies">Jumlah Total Buku</label>
                <input type="number" name="total_copies" id="total_copies" required>
            </div>
            <div>
                <label for="synopsis">Sinopsis</label>
                <textarea name="synopsis" id="synopsis" rows="5" required></textarea>
            </div>
            <div>
                <label for="price">Harga</label>
                <input type="number" step="0.01" name="price" id="price" required>
            </div>
            <div>
                <label for="book_image">Gambar Buku</label>
                <input type="file" name="book_image" id="book_image" required>
            </div>
            <div>
                <label>Genre</label>
                @foreach ($genres as $genre)
                    <div>
                        <input type="checkbox" name="genres[]" id="genre_{{ $genre->id }}" value="{{ $genre->id }}">
                        <label for="genre_{{ $genre->id }}">{{ $genre->name_genre }}</label>
                    </div>
                @endforeach
                <small>* Pilih satu atau lebih genre</small>
            </div>
            
            <div>
                <button type="submit">Tambah Buku</button>
            </div>
        </form>
    </div>
</body>

</html>
