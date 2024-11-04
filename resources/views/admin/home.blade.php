<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('styles/adminHome.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Admin Page</title>
</head>

<body>
    <nav class="navbar">
        <a href="../home/home.html" class="brand">Admin REKAN PABRIK</a>
        <div class="nav-container">
            <div class="nav-links">
                <a href="../users/user.html" class="nav-item"> User </a>
                <a href="../report/report.html" class="nav-item"> Laporan </a>
                <a href="../profile/profile.html" class="nav-item"> Profil </a>
            </div>
        </div>
        <div class="logout-container">
            <a href="#" class="nav-item logout"> Logout </a>
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
        Distribusi Data Admin, Pelamar, HRD, dan Pekerjaan
    </h1>
    <div id="myChart"></div>
    <script src="{{ asset('js/adminHome.js') }}"></script>
    <script>
        // Mengonversi data PHP ke JSON agar bisa diakses di file JavaScript eksternal
        window.apiData = {
            user: @json($user),
            jumlahPelamar: @json($jumlahPelamar),
            jumlahAdmin: @json($jumlahAdmin),
            jumlahPerusahaan: @json($jumlahPerusahaan),
            jumlahPostinganPekerjaan: @json($jumlahPostinganPekerjaan)
        };
    </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
