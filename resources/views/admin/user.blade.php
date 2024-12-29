<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/user.css'])
</head>

<body>
    <div class="sidebar">
        <h2>Hallo Admin</h2>
        <ul>
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="{{ request()->is('admin/user') ? 'active' : '' }}"><a href="{{ route('admin.dataUser') }}"><i class="fas fa-user"></i> Data User</a></li>
            <li class="{{ request()->is('admin/buku') ? 'active' : '' }}"><a href="{{ route('admin.dataBuku') }}"><i class="fas fa-book"></i> Data Buku</a></li>
            <li class="{{ request()->is('admin/transaksi') ? 'active' : '' }}"><a href="{{ route('admin.transaksi') }}"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
        </ul>
    </div>

    <div class="content">
        <h3>Data User</h3>

        <table class="user-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
