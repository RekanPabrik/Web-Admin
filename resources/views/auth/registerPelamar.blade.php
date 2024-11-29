<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Pelamar</title>
    <link rel="stylesheet" href="{{ asset('styles/registerPelamar.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>

<body>
    <!-- navbar start -->
    <header>
        <nav class="navbar" id="navbar">
            <a href="/">
                <img src="{{ asset('assets/logoRekanPabrik.png') }}" alt="" class="nav-logo" />
            </a>
            <ul class="nav-ul" id="menu-list">
                <li class="nav-li">
                    <a href="/aboutUS" class="nav-a">about us</a>
                </li>
                <li class="nav-li">
                    <a href="/createAccountHRD" class="nav-a">for the company</a>
                </li>
                <li class="nav-li">
                    <a href="/contactUS" class="nav-a">contact Us</a>
                </li>
                <a href="/loginPage" class="nav-a"><button class="lgn-btn">Login</button></a>
            </ul>
        </nav>
    </header>
    <!-- navbar end -->

    <!-- container 1 start -->
    <div class="containerSatu">
        <h1>welcome applicants</h1>
        <p>Sign up to your account to continue</p>
    </div>
    <!-- container 1 end -->

    <!-- container 2 start -->
    <section>
        <div class="containerDua">
            <div class="formContainer">
                <form id="registrationForm" onsubmit="createAccount(event)">
                    @csrf
                    <div class="nameContainer">
                        <div>
                            <label for="Fname">First name</label><br />
                            <input type="text" name="Fname" id="Fname" />
                            <span class="error" id="FnameError"></span>
                        </div>
                        <div>
                            <label for="Lname">Last name</label><br />
                            <input type="text" name="Lname" id="Lname" />
                            <span class="error" id="LnameError"></span>
                        </div>
                    </div>
                    <div class="emailContainer">
                        <label for="email">Email</label><br />
                        <input type="email" name="email" id="email" />
                        <span class="error" id="emailError"></span>
                    </div>
                    <div class="passwordContainer">
                        <label for="password">Password</label><br />
                        <input type="password" name="password" id="password" />
                        <span class="error" id="passwordError"></span>
                    </div>
                    <div class="confirmPassContainer">
                        <label for="confirmpassword">Confirm Password</label><br />
                        <input type="password" name="confirmpassword" id="confirmpassword" />
                        <span class="error" id="confirmpasswordError"></span>
                    </div>
                    <div class="btn-Container">
                        <button type="submit" >Create Account</button>
                    </div>
                </form>
            </div>
            <div class="imgContainer">
                <img src="{{ asset('assets/logoRekanPabrik.png') }}" alt="logoRekanPabrik" />
            </div>
        </div>
    </section>

    <!-- container 2 end -->

    <div class="margintop"></div>
    <!-- footer start -->
    <footer class="footer">
        <div class="alamat">
            <h1 class="h1-address">Address</h1>
            <p class="p-address">
                Gedung Panehan Pasca Sarjana Lantai 1,Jl. Telekomunikasi Terusan Buah
                Batu, Bandung - 40257, Indonesia
            </p>
        </div>
        <div class="gambar">
            <img src="{{ asset('assets/logoRekanPabrik.png') }}" alt="logo rekan pabrik" />
        </div>
        <div class="socialMedia">
            <h1 class="h1-socialMedia">sosial media</h1>
            <div class="icon">
                <a href="">
                    <span class="grommet-icons--instagram"></span>
                </a>
                <a href="">
                    <span class="el--linkedin"></span>
                </a>
            </div>
        </div>
    </footer>
    <!-- foooter end -->
    <script src="{{ asset('js/registerPelamar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
