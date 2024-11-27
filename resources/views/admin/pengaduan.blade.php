<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('styles/adminPengaduan.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Pengaduan Page</title>
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

    <div class="container-utama">
        <h1>Daftar Pengaduan</h1>
        <table id="pengaduanTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>nomor telpon</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>


    </div>

    <script src="{{ asset('js/admin/adminPengaduan.js') }}"></script>
    <script>
        window.apiData = {
            pengaduan: @json($dataPengaduan),
        };
    </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
