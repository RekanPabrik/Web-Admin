<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('styles/adminLaporan.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Laporan page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
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

    <div class="container">
        <h1>Laporan Pendaftaran Pekerjaan</h1>
        
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari berdasarkan nama atau posisi...">
            <select id="statusFilter" class="status-filter">
                <option value="all">Semua Status</option>
                <option value="Diproses">Diproses</option>
                <option value="Diterima">Diterima</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        <table id="jobTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Nama perusahaan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/admin/adminLaporan.js') }}"></script>
    <script>
        window.apiData = {
            dataLaporan: @json($dataLaporan)
        };
    </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>