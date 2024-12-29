<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="button-group">
                        <button id="editButton" class="btn-edit">Edit</button>
                    </div>
                </div>
                <div class="form-container">

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')
                    
                        <div class="left">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>

                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ Auth::user()->username }}" required>
                        </div>
                    
                        <div class="right">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}" required>

                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" required>
                        </div>
                    
                        <button type="submit">Save</button>
                    </form>
                    
                </div>
        </main>
    </div>

    <script>
        // Get elements
        const editButton = document.getElementById('editButton');
        const inputs = document.querySelectorAll('input');

        // Add event listener to the Edit button
        editButton.addEventListener('click', () => {
            const isEditing = editButton.textContent.trim() === 'Save';

            // Toggle button text
            editButton.textContent = isEditing ? 'Edit' : 'Save';

            // Enable or disable inputs
            inputs.forEach(input => {
                input.disabled = isEditing;

                // Optionally, add a class to indicate active inputs
                if (!isEditing) {
                    input.classList.add('active-input');
                } else {
                    input.classList.remove('active-input');
                }
            });
        });

    </script>

</body>

</html>
