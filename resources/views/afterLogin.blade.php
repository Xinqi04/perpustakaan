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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/afterlogin.css', 'resources/js/afterlogin.js'])
</head>


    <body>
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
                                <!-- Pinjam Buku -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                                </li>
                                <!-- Katalog Buku -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/katalogBuku') }}">Katalog Buku</a>
                                </li>
                                <!-- Wishlist Buku -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist Buku</a>
                                </li>
                                <!-- Contact Us -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact-us">Contact Us</a>
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
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="bgblue">
                <img src="{{ asset('../images/Group 239182.png') }}" alt="bgblue">
            </div>
            <div class="hero" data-aos="fade-up" data-aos-duration="1000">
                <div class="text">
                    <h1>Selamat Datang {{ Auth::user()->name }}<br>di <span>Perpustakaan <br> Online</span>!</h1>
                    <p>Embark on a literary journey like never before with our revolutionary library application!
                        Introducing a seamless experience that transcends traditional boundaries, where you can effortlessly
                        search your favorite books.</p>
                    <div class="search-bar">
                        <input placeholder="Cari" type="text" />
                        <button>Browse Now!</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="book-section" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-center mb-4" style="font-size: 2.5rem; padding: 20px;">Katalog Buku</h2> 
            <!-- <h2>Buku</h2> -->
            <div class="buku" id="katalog">
                <div class="books">
                    <!-- Repeat book div as necessary -->
                    @foreach ($books as $book)
                    <div class="card">
                        <a href="/books/{{ $book->id }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('images/Bintang.png') }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->author }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="show-more">
                        <a href="#" class="show-more-link">Show More Books</a>
                    </div>
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
                <input type="text" placeholder="Enter your name" />
                <input type="email" placeholder="Enter your email" />
                <textarea placeholder="Type your message here"></textarea>
                <button class="submit-button">Submit</button>
            </div>
        </footer>

        <div class="copyright-info">
            <p>&copy; 2024 Perpustakaan Online. All rights reserved.</p>
        </div>
    </body>

    <script>
        AOS.init();
    
        async function loadBooks(genre = null) {
            try {
                const url = genre ? `/books?genre=${genre}` : '/books';
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error('Gagal memuat data buku');
                }
                const books = await response.json();
                const katalogContent = document.getElementById('katalog');
                katalogContent.innerHTML = '';
                if (books.length === 0) {
                    katalogContent.innerHTML = '<p class="text-muted">Tidak ada buku dalam genre ini.</p>';
                    return;
                }
                books.forEach(book => {
                const bookCard = document.createElement('div');
                bookCard.classList.add('col-md-2', 'mb-4');
                bookCard.innerHTML = `
                    <div class="book">
                        <a href="/books/${book.id}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('../images/Bintang.png') }}" class="card-img-top" alt="${book.title}">
                            <div class="card-body">
                                <h5 class="card-title">${book.title}</h5>
                                <p class="card-text">${book.author}</p>
                            </div>
                        </a>
                    </div>
                `;
                katalogContent.appendChild(bookCard);
            });

            } catch (error) {
                console.error(error);
                document.getElementById('katalog').innerHTML = '<p class="text-danger">Gagal memuat katalog buku.</p>';
            }
        }
    
        // Initial load of books
        loadBooks();
    </script>
    

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6aF0d94RtvfUAN5z7w4VZKqD3z0D+HhV8U26pXceO2dN" crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>
    <script src="{{ asset('../resources/js/afterlogin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html