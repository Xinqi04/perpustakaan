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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/pinjambuku.css', 'resources/js/pinjambuku.js'])
</head>

<body>
    <section class="pinjambuku" data-aos="fade-in">
        <h2>Pinjam Buku</h2>
    </section>
    <section class="pinjam-container" data-aos="fade-up" data-aos-duration="3000ms">
        <div class="pinjam">
            <p class="text"><span>Home </span> / Pinjam Buku</p>
            <h3>Pinjam Buku</h3>
            <p>Input your full name, username, phone number and password.</p>
            <div class="form-container">
                <div class="left">
                    <label for="name">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        placeholder="Masukkan Nama" 
                        value="{{ $user->name }}" 
                        readonly 
                        required
                    >

                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        placeholder="Masukkan Email" 
                        value="{{ $user->email }}" 
                        readonly 
                        required
                    >

                    <label for="phonenumber">Phone Number</label>
                    <input 
                        type="text" 
                        id="phonenumber" 
                        placeholder="Masukkan Nomor Telepon" 
                        value="{{ $user->phone_number }}" 
                        readonly 
                        required
                    >

                    <label for="judulauthor">Judul Buku - Author</label>
                    <input 
                        type="text" 
                        id="judulauthor" 
                        placeholder="Masukkan Judul Buku" 
                        value="{{ $book->title }} - {{ $book->author }}" 
                        readonly 
                        required
                    >

                    <label for="tanggalpinjam">Tanggal Peminjaman</label>
                    <input 
                        type="date" 
                        id="tanggalpinjam" 
                        name="tanggalpinjam" 
                        required
                    >
                </div>
            </div>
        </div>
        <div class="checkbox-container">
            <input type="checkbox" id="terms" />
            <label for="terms">I agree to the <a href="/terms/terms.html">terms and conditions</a></label>
        </div>
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" id="loan_date_hidden" name="loan_date" value="">
        <button id="submitBtn" disabled>Submit</button>
        </form>
    </section>
    

    <footer>
        &copy; 2024 Perpustakaan Online. All rights reserved.
    </footer>

    <script>
        // Ambil elemen
        const tanggalPinjamInput = document.getElementById('tanggalpinjam');
        const loanDateHiddenInput = document.getElementById('loan_date_hidden');
        const submitBtn = document.getElementById('submitBtn');
        const termsCheckbox = document.getElementById('terms');
    
        // Update input hidden saat tanggal diubah
        tanggalPinjamInput.addEventListener('input', function () {
            loanDateHiddenInput.value = this.value;
        });
    
        // Aktifkan tombol submit hanya jika checkbox terms dicentang
        termsCheckbox.addEventListener('change', function () {
            submitBtn.disabled = !this.checked;
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>