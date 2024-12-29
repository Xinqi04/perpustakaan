<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="riwayat.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="icon">
          <span class="material-symbols-outlined" id="toggleIcon">keyboard_double_arrow_right</span>
          <span class="material-symbols-outlined toggle-icon" id="toggleIconExpanded">keyboard_double_arrow_left</span>
          <span class="textSidebar"></span>
        </div>
        <div class="icon" id="dashboard">
          <span class="material-symbols-outlined">dashboard</span>
          <span class="textSidebar"></span>
        </div>
        <div class="icon" id="groupChat">
          <span class="material-symbols-outlined">pie_chart</span>
          <span class="textSidebar"></span>
        </div>
        <div class="icon" id="groupChat">
            <span class="material-symbols-outlined">workspace_premium</span>
            <span class="textSidebar"></span>
          </div>
          <div class="icon" id="groupChat">
            <span class="material-symbols-outlined">forum</span>
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
        <h1>Welcome, Amanda</h1>
      </div>
      <div class="header-right">
        <p>Tue, 07 June 2022</p>
        <div class="profile-pic"></div>
      </div>
    </header>

    <div class="content">
        <div class="search-bar">
            <div class="search-wrapper">
                <input type="text" placeholder="Cari..." class="search-input">
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <select class="category-select">
                <option>Status</option>
            </select>
        </div>

        <table class="transaction-table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Author</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Tenggat Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Harry Potter</td>
                    <td>J.K. Rowling</td>
                    <td>2024-12-01</td>
                    <td>2024-12-15</td>
                    <td>
                        <button class="action-btn sukses-btn">Sukses</button>
                    </td>
                </tr>
                <tr>
                    <td>Hujan</td>
                    <td>Tereliye</td>
                    <td>2024-12-05</td>
                    <td>2024-12-20</td>
                    <td>
                        <button class="action-btn gagal-btn">Gagal</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  <script src="riwayat.js"></script>
</body>
</html>