<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    @laravelPWA
    <link rel="stylesheet" href="profil.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/profil.css', 'resources/js/profil.js'])
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
                <p>Tue, 07 June 2022</p>
                <div class="profile-pic"></div>
            </div>
        </header>

        <main>
            <div class="profile">
                <div class="profile-header">
                    <img src="https://via.placeholder.com/100" alt="User" class="avatar">
                    <div class="profile-info">
                        <h2 id="profileName">{{ Auth::user()->name }}</h2>
                        <p id="profileEmail">{{ Auth::user()->email }}</p>
                    </div>
                    {{-- <div class="button-group">
                        <button class="btn-edit" id="editButton">Edit</button>
                        <button class="btn-save" id="saveButton" style="display:none;">Save</button>
                    </div> --}}
                </div>
                <div class="form-container">
                    <div class="left">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" value="{{ Auth::user()->name }}" disabled>

                        <label for="username">Username</label>
                        <input type="text" id="username" value="{{ Auth::user()->username }}" disabled>
                    </div>
                    <div class="right">
                        <label for="phonenumber">Phone Number</label>
                        <input type="text" id="phonenumber" value="{{ Auth::user()->phone_number }}" disabled>

                        <label for="address">Address</label>
                        <input type="text" id="address" value="{{ Auth::user()->address }}" disabled>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="profil.js"></script>
    <script>
        document.getElementById('editButton').addEventListener('click', function () {
        // Enable the form fields for editing
        document.getElementById('fullname').disabled = false;
        document.getElementById('username').disabled = false;
        document.getElementById('phonenumber').disabled = false;
        document.getElementById('address').disabled = false;

        // Show the Save button and hide the Edit button
        document.getElementById('saveButton').style.display = 'inline-block';
        document.getElementById('editButton').style.display = 'none';
    });

    document.getElementById('saveButton').addEventListener('click', function () {
        // Simulate saving the updated data (You can add an AJAX request here)
        const fullname = document.getElementById('fullname').value;
        const username = document.getElementById('username').value;
        const phone = document.getElementById('phonenumber').value;
        const address = document.getElementById('address').value;

        // Update the profile header with new data
        document.getElementById('profileName').textContent = fullname;
        document.getElementById('username').textContent = username; // Assuming the email is updated in username

        // Disable the form fields after saving
        document.getElementById('fullname').disabled = true;
        document.getElementById('username').disabled = true;
        document.getElementById('phonenumber').disabled = true;
        document.getElementById('address').disabled = true;

        // Hide the Save button and show the Edit button
        document.getElementById('saveButton').style.display = 'none';
        document.getElementById('editButton').style.display = 'inline-block';

        // Optional: You can send the updated data to the server using an AJAX request
        // Example:
        // fetch('/profile', { method: 'POST', body: JSON.stringify({ fullname, username, phone, address }) });
    });

    </script>

    <script>
        document.getElementById("groupChat").addEventListener("click", function () {
            window.location.href = "/riwayat";
        });
    </script>
</body>

</html>
