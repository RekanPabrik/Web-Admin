<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('styles/adminHomePage.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Admin Page</title>
</head>

<body>
    <nav class="navbar">
        <a href="/admin/Home" class="brand">Admin REKAN PABRIK</a>
        <div class="nav-container">
            <div class="nav-links">
                <a href="/admin/userReports" class="nav-item"> User </a>
                <a href="/admin/pengaduan" class="nav-item"> Pengaduan </a>
                <a href="/admin/laporan" class="nav-item"> Laporan </a>
                <a href="/admin/profile" class="nav-item"> Profil </a>
            </div>
        </div>
    </nav>
    <div class="center">
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
            <div class="stat-card">
                <div class="stat-icon following">
                    <i>🏭</i>
                </div>
                <div class="stat-info">
                    <h3>Jumalah Pekerjaan</h3>
                    <p class="stat-number jumlahPekerjaan"></p>
                </div>
            </div>
        </div>
    </div>
    <h1 class="chartTitle">
        Distribusi Data Admin, Pelamar, Perusahaan, dan Pekerjaan
    </h1>
    <div id="myChart"></div>
    <script src="{{ asset('js/admin/adminHome.js') }}"></script>
    <script>
        window.apiData = {
            user: @json($userFound),
            jumlahData: @json($jumlahDataUser)
        };
    </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
