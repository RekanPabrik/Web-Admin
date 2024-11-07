<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('styles/adminProfile.css') }}" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>

<body>
    <nav class="navbar">
        <a href="/admin/Home" class="brand">Admin REKAN PABRIK</a>
        <div class="nav-container">
            <div class="nav-links">
                <a href="/admin/userReports" class="nav-item"> User </a>
                <a href="../report/report.html" class="nav-item"> Laporan </a>
                <a href="/admin/profile" class="nav-item"> Profil </a>
            </div>
        </div>
        <div class="logout-container">
            <a href="#" class="nav-item logout"> Logout </a>
        </div>
    </nav>

    <div class="container">
        <div class="profile-header">
            <h1 class="profile-name" id="profileName"></h1>
            <p class="profile-bio" id="profileBio"></p>
            <button class="edit-button" onclick="toggleEdit()">Edit Profile</button>
        </div>

        <div class="profile-info">
            <div class="info-item">
                <div class="info-label">Fisrt name</div>
                <div class="info-value" id="Fname"></div>
            </div>
            <div class="info-item">
                <div class="info-label">Fisrt name</div>
                <div class="info-value" id="Lname"></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value" id="email"></div>
            </div>

            <div class="edit-form" id="editForm">
                <div class="form-group">
                    <label for="nameInput">First name</label>
                    <input type="text" id="firstNameInput">
                </div>
                <div class="form-group">
                    <label for="nameInput">Last Name</label>
                    <input type="text" id="lastNameInput">
                </div>
                
                <div class="form-group">
                    <label for="locationInput">Role</label>
                    <input type="text" id="Role" readonly>
                </div>
                <div class="form-group">
                    <label for="emailInput">Email</label>
                    <input type="email" id="emailInput">
                </div>
                <button class="save-button" onclick="updateProfile()">Save Changes</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/adminProfile.js') }}"></script>
    <script>
        window.apiData = {
            user: @json($userFound)
        };
    </script>
</body>

</html>
