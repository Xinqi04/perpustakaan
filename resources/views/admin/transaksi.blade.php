<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Admin Panel</title>
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="transaksi.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/transaksi.css'])
    <script>
        // JavaScript untuk live query berdasarkan status dan pencarian
        function handleFormChange() {
            document.getElementById('loanFilterForm').submit();
        }
    </script>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Hallo Admin</h2>
        <ul>
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                <a href="{{ route('admin.dataUser') }}"><i class="fas fa-user"></i> Data User</a>
            </li>
            <li class="{{ request()->is('admin/buku') ? 'active' : '' }}">
                <a href="{{ route('admin.dataBuku') }}"><i class="fas fa-book"></i> Data Buku</a>
            </li>
            <li class="{{ request()->is('admin/transaksi') ? 'active' : '' }}">
                <a href="{{ route('admin.loans') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="search-bar">
            <div class="search-wrapper">
                <!-- Pencarian berdasarkan User atau Buku -->
                <form id="loanFilterForm" method="GET" action="{{ route('admin.loans') }}">
                    <input type="text" name="search" placeholder="Cari nama user atau buku..." class="search-input" value="{{ request()->input('search') }}" oninput="handleFormChange()">
                </form>
            </div>
        </div>

        <!-- Tabel Transaksi -->
        <table class="transaction-table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>User</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Tenggat Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->user->name }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.updateStatus', $loan->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Belum Dipinjam" {{ $loan->status == 'Belum Dipinjam' ? 'selected' : '' }}>Belum Dipinjam</option>
                                    <option value="Gagal" {{ $loan->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                    <option value="Berhasil" {{ $loan->status == 'Berhasil' ? 'selected' : '' }}>Berhasil</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
