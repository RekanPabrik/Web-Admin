<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <a href="../report/report.html" class="nav-item"> Laporan </a>
                <a href="/admin/profile" class="nav-item"> Profil </a>
            </div>
        </div>
        <div class="logout-container">
            <a href="#" class="nav-item logout"> Logout </a>
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
                <h3>HRD</h3>
                <p class="stat-number HRD"></p>
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
        <h1>Daftar HRD</h1>
        <table id="HRDTable">
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
    <script src="{{ asset('js/adminUser.js') }}"></script>
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
