<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Perpustakaan Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/detailbuku.css', 'resources/js/detailbuku.js'])
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
                            <!-- Katalog Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}?verified=1">Katalog Buku</a>
                            </li>
                            <!-- Pinjam Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="/pinjambuku/pinjambuku.html">Pinjam Buku</a>
                            </li>
                            <!-- Wishlist Buku -->
                            <li class="nav-item">
                                <a class="nav-link" href="/wishlistbuku/wishlistbuku.html">Wishlist Buku</a>
                            </li>
                            <!-- Contact Us -->
                            <li class="nav-item">
                                <a class="nav-link" href="#contact-us">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/landingpage/landingpage.html">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="container" data-aos="fade-in">
        <div class="cover">
            <img src="{{ asset('../images/Bintang.png') }}" alt="Bumi" data-aos="fade-right">
        </div>
        <div class="sinopsis-buku">
            <div class="judul">
                <p>{{ $book->author }}</p>
                <h2>{{ $book->title }}</h2>
                <p>Published Year: {{ $book->published_year }}</p>
                <p>Publisher: {{ $book->publisher }}</p>
                <button class="wishlist">Add to wishlist</button>
            </div>
            <div class="deskripsi">
                <h3>Sinopsis</h3>
                <p>{{ $book->synopsis }}</p>
            </div>
            {{-- <div class="sinopsis">
                <h3>Sinopsis</h3>
                <p>
                    Tere Liye kembali mengkreasikan imajinasinya kedalam kedalam beberapa rangkaian novel.
                    Bumi, merupakan rangkaian awal dari kisah sekelompok anak remaja berkemampuan istimewa.
                    Menceritakan tentang Raib, Ali, dan Seli yang bertualang ke dunia paralel. Mereka yang
                    istimewa, mampu pergi ke dunia pararel bumi, bertemu dengan klan lain dan berhadapan
                    dengan Tamus yang memiliki ambisi membebaskan si Tanpa Mahkota dan kemudian, menguasai
                    bumi. Perkenalkan, Raib, seorang gadis belia berusia lima belas tahun yang tidak biasa.
                    Dia bisa menghilang. Jangan beritahu siapapun, Itu adalah rahasia terbesar yang tak pernah
                    ia ceritakan pada siapapun, termasuk kedua orangtuanya. Kehidupannya tetap berjalan normal,
                    meskipun untuk dirinya sendiri. Tidak jarang Raib menjahili orang tuanya dengan tiba-tiba
                    menghilang, lalu muncul kembali secara tiba-tiba membuat kaget kedua orangtuanya.
                    Tidak hanya menyuguhkan cerita fantasi, novel ini juga memberikan pesan moral tentang keluarga,
                    dan persahabatan. Tere Liye sukses membangun kisah persahabatan antara Raib, Ali, dan Seli terasa
                    nyata. Hubungan antara Raib dan keluarganya membuat pembaca penasaran sekaligus tersadar akan cara
                    berkomunikasi dengan orang tua. Tere Liye memberikan banyak kejutan di tiap halaman yang
                    direpresentasikan oleh Raib, membuat pembaca dapat menikmati cerita yang seolah tidak akan
                    ada habisnya. Tere Liye berhasil meracik buku ini sebagai bahan baca para pecinta novel sastra
                    maupun fantasi.
                </p>
            </div> --}}
            <div class="pinjam">
                <a href="/pinjambuku/pinjambuku.html">
                    <button>Pinjam Buku</button>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact-us">
        <div class="contact-info">
            <div class="gbrinfo">
                <img src="/img/fluent-color_library-20.png" alt="Library Icon" />
            </div>
            <div class="phone-info">
                <img src="/img/phone.png" alt="Phone Icon" class="phone-icon" />
                <p>+62 888 999 777</p>
            </div>
            <div class="email-info">
                <img src="/img/email.png" alt="email icon" class="email-icon" />
                <p>example@email.com</p>
            </div>
            <div class="lokasi-info">
                <img src="/img/location.png" alt="lokasi icon" class="lokasi-icon" />
                <p>Jl. Jalan, Kota Bandung, Jawa Barat, Indonesia</p>
            </div>
        </div>

        <div class="contact-form">
            <h2>Perpustakaan Online</h2>
            <p>Any question or remarks? Let us know!</p>
            <input type="text" placeholder="Enter your name" />
            <input type="email" placeholder="Enter your email" />
            <textarea placeholder="Type your message here"></textarea>
            <button>Submit</button>
        </div>
    </footer>

    <div class="copyright-info">
        <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
    </div>

    <script src="detailbuku.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>
