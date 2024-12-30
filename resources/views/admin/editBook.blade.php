<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @laravelPWA
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link ke file CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/editbuku.css'])
</head>

<body>
    <div class="container">
        <h1>Edit Buku</h1>

        <form action="{{ route('admin.buku.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input type="text" id="title" name="judul" value="{{ old('judul', $book->title) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" id="author" name="penulis" value="{{ old('penulis', $book->author) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="form-control" required>
            </div>

            <div>
                <label>Genre</label>
                @foreach ($genres as $genre)
                    <div>
                        <input type="checkbox" name="genres[]" id="genre_{{ $genre->id }}" value="{{ $genre->id }}"
                        @if(in_array($genre->id, $book->genres->pluck('id')->toArray())) checked @endif>
                        <label for="genre_{{ $genre->id }}">{{ $genre->name_genre }}</label>
                    </div>
                @endforeach
                <small>* Pilih satu atau lebih genre</small>
            </div>

            <div class="form-group">
                <label for="available_copies">Stok Buku</label>
                <input type="number" id="available_copies" name="stok" value="{{ old('stok', $book->available_copies) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="book_image">Gambar Buku</label>
                <input type="file" id="book_image" name="book_image" class="form-control">
                @if($book->book_image)
                    <img src="{{ asset('storage/' . $book->book_image) }}" alt="Book Image" class="mt-2" width="100">
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>

</html>
