<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('styles/adminUserPage.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>

<body>
    <nav class="navbar">
        <a href="/admin/Home" class="brand">Admin REKAN PABRIK</a>
        <div class="nav-container">
            <div class="nav-links">
                <a href="/admin/userReports" class="nav-item"> User </a>
                <a href="/admin/pengaduan" class="nav-item"> Pengaduan </a>
                <a href="/admin/profile" class="nav-item"> Profil </a>
            </div>
        </div>
    </nav>
    <!-- Stats Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon following">
                <i>👨‍💻</i>
            </div>
            <div class="stat-info">
                <h3>Admin</h3>
                <p class="stat-number admin"></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon following">
                <i>👤</i>
            </div>
            <div class="stat-info">
                <h3>Perusahaan</h3>
                <p class="stat-number Perusahaan"></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon following">
                <i>👨‍🔬</i>
            </div>
            <div class="stat-info">
                <h3>Pelamar</h3>
                <p class="stat-number pelamar"></p>
            </div>
        </div>
    </div>
    <div class="container-utama">
        <h1>Daftar Admin</h1>
        <table id="AdminTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <button class="tambahAdminBTN" id="tambahBtn">Tambah Admin</button>
        <div class="margin"></div>
        <h1>Daftar Pelamar</h1>
        <table id="pelamarTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="margin"></div>
        <h1>Daftar Perusahaan</h1>
        <table id="PerusahaanTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="marginDua"></div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Admin</h2>
            <br>
            <form id="userForm">
                <label for="first_name">First Name:</label><br>
                <input type="text" id="first_name" name="first_name" >
                <br><br>
    
                <label for="last_name">Last Name:</label><br>
                <input type="text" id="last_name" name="last_name" >
                <br><br>
    
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" >
                <br><br>
    
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" >
                <br><br>
    
                <label for="confirm_password">Konfirmasi Password:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" >
                <p id="passwordError" style="color: red; display: none;">Password dan konfirmasi password tidak sesuai</p>

                <br><br>
    
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/admin/adminUser.js') }}"></script>
    <script>
        window.apiData = {
            jumlahData: @json($jumlahDataUser),
            dataUserWebsite: @json($data)
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
