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

    <section class="container" data-aos="fade-in">
    <img src="{{ asset('storage/' . $book->book_image) }}" alt="Bumi" data-aos="fade-right">
    <div class="sinopsis-buku">
        <div class="judul">
            <p>{{ Auth::user()->name }}</p>
            <p>{{ $book->author }}</p>
            <h2>{{ $book->title }}</h2>
            <p>Published Year: {{ $book->published_year }}</p>
            <p>Publisher: {{ $book->publisher }}</p>
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <button type="submit" class="wishlist">Add to Wishlist</button>
            </form>
        </div>
        <div class="deskripsi">
            <h3>Sinopsis</h3>
            <p>{{ $book->synopsis }}</p>
        </div>
        <div class="pinjam">
            <a href="{{ route('loans.create', ['user_id' => auth()->user()->id, 'book_id' => $book->id]) }}">
                <button type="button">Pinjam Buku</button>
            </a>
        </div>
    </div>
</section>


<footer class="footer" id="contact-us" data-aos="fade-up" data-aos-duration="1000">
    <div class="contact-info">
        <div class="gbrinfo">
            <img src="{{ asset('../images/fluent-color_library-20.png') }}" alt="Library Icon" />
        </div>
        <div class="phone-info">
            <img src="{{ asset('../images/phone.png') }}" alt="Phone Icon" class="phone-icon" />
            <p>+62 888 999 777</p>
        </div>
        <div class="email-info">
            <img src="{{ asset('../images/email.png') }}" alt="email icon" class="email-icon" />
            <p>example@email.com</p>
        </div>
        <div class="lokasi-info">
            <img src="{{ asset('../images/location.png') }}" alt="lokasi icon" class="lokasi-icon" />
            <p>Jl. Jalan, Kota Bandung, Jawa Barat, Indonesia</p>
        </div>
    </div>

    <div class="contact-form">
        <h2>Perpustakaan Online</h2>
        <p>Any question or remarks? Let us know!</p>
        <form action="https://api.web3forms.com/submit" method="POST">
            <!-- Replace with your Access Key -->
            <input type="hidden" name="access_key" value="6c1f757d-a48d-4694-a6d9-c10caddcc742">
            
            <!-- Form Inputs. Each input must have a name="" attribute -->
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <textarea name="message" placeholder="Type your message here" required></textarea>
    
            <!-- Honeypot Spam Protection -->
            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
    
            <!-- Submit Button -->
            <button type="submit" class="submit-button">Submit</button>
        </form>

    </div>
    
</footer>

    <div class="copyright-info">
        <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
    </div>

    <script src="detailbuku.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
            });
        @endif
    
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        @endif
    </script>

<script src="{{ asset('resources/js/detailbuku.js') }}"></script>

</body>

</html>