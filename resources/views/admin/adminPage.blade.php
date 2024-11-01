<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Admin</title>
    <link rel="stylesheet" href="{{ asset('styles/homeAdmin.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    
    <!-- side bar start -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            {{-- @if (isset($user))
            <p>{{$user}}</p>
                <h2>Wellcome</h2>
                <p> {{ $user['first_name'] }} {{ $user['last_name'] }}</p>
            @else
                <p>User data not available.</p>
            @endif --}}
            @if (isset($user))
                <h2>Welcome</h2>
                <p>{{ $user['first_name'] }} {{ $user['last_name'] }}</p>
                <p>Your role: {{ $user['role'] }}</p>
            @else
                <p>User data not available.</p>
            @endif
        </div>
        <ul class="nav-list">
            <li><a href="./home.html">Dashboard</a></li>
            <li><a href="">Users</a></li>
            <li><a href="">Settings</a></li>
            <li><a href="">Reports</a></li>
            <li><a href="">Logout</a></li>
        </ul>
    </div>
    <!-- side bar end -->

    <!-- main content start -->
    <div class="main-content" id="main-content">
        <button id="toggle-btn">☰</button>
        <h1 class="wellcomeTXT">Selamat datang di dashboard admin</h1>
        <div class="dashboard">
            <h2>Jumlah Pengguna Aktif</h2>
            <div class="jumlahUserContainer">
                <div class="jumlahUser">
                    <h3>jumlah pelamar</h3>
                    <p>30</p>
                </div>
                <div class="jumlahHRD">
                    <h3>jumlah HRD</h3>
                    <p>30</p>
                </div>
                <div class="jumlahAdmin">
                    <h3>jumlah admin</h3>
                    <p>5</p>
                </div>
            </div>
            <h2>postingan pekerjaan</h2>
            <div class="jumlahUserContainer">
                <div class="jumlahUser">
                    <h3>jumlah postingan pekerjaan</h3>
                    <p>30</p>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <!-- main content end -->



    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
