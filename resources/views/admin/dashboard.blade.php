<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dashboardadmin.css'])
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
        <h1>Ringkasan Admin</h1>

        <!-- Statistik -->
        <div class="stats">
            <div class="stat">
                <h2>{{ $totalUsers }}</h2>
                <p>Total Pengguna</p>
            </div>
            <div class="stat">
                <h2>{{ $totalBooks }}</h2>
                <p>Total Buku</p>
            </div>
            <div class="stat">
                <h2>{{ $totalLoans }}</h2>
                <p>Total Peminjaman</p>
            </div>
            <div class="stat">
                <h2>{{ $successfulLoans }}</h2>
                <p>Peminjaman Berhasil</p>
            </div>
        </div>

        <!-- Peminjaman Hari Ini -->
        <h2>Peminjaman Hari Ini</h2>
        <table class="task-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Judul Buku</th>
                    <th>Status</th>
                    <th>Tanggal Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                @forelse($todayLoans as $index => $loan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $loan->user->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada peminjaman hari ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Logout Button at Top Right -->
    <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
