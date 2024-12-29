<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Peminjaman</title>
  @laravelPWA
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/riwayat.css', 'resources/js/profil.js'])
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="icon">
            <span class="material-symbols-outlined" id="toggleIcon">keyboard_double_arrow_right</span>
            <span class="material-symbols-outlined toggle-icon"
                id="toggleIconExpanded">keyboard_double_arrow_left</span>
            <span class="textSidebar"></span>
        </div>
        <div class="icon" id="dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="textSidebar"></span>
        </div>
        <div class="icon" id="groupChat">
            <span class="material-symbols-outlined">settings</span>
            <span class="textSidebar"></span>
        </div>
    </div>

    <div class="container">
        <header>
            <div class="header-left">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
            </div>
            <div class="header-right">
                <p>{{ now()->format('l, d F Y') }}</p>
                <div class="profile-pic"></div>
            </div>
        </header>

        <div class="content">
            <div class="search-bar">
            </div>

            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Author</th>
                        <th>Tanggal Dipinjam</th>
                        <th>Tenggat Waktu</th>
                        <th>
                                Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $transaction)
                        <tr>
                            <td>{{ $transaction->book->title }}</td>
                            <td>{{ $transaction->book->author }}</td>
                            <td>{{ $transaction->loan_date }}</td>
                            <td>{{ $transaction->return_date }}</td>
                            <td>
                                <span class="
                                    {{ $transaction->status == 'Berhasil' ? 'sukses-text' : 
                                    ($transaction->status == 'Gagal' ? 'gagal-text' : 
                                    ($transaction->status == 'Belum Dipinjam' ? 'belum-dipinjam-text' : '')) }}">
                                    {{ $transaction->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById("dashboard").addEventListener("click", function () {
            window.location.href = "/user/transactions";
        });
    </script>
    <script>
        document.getElementById("groupChat").addEventListener("click", function () {
            window.location.href = "/profile";
        });
    </script>
</body>
</html>
