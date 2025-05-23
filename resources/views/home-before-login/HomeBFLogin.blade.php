<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('styles/HomeBFLogin.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
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

    <!-- zero section -->
    <section>
        <div class="zero-section">
            <div class="zero-section-container">
                <img src="{{ asset('assets/zeroSectionIMG-01.png') }}" alt="" class="img-zeroSection" />
                <div class="containerZeroSectionTXT">
                    <h1 class="zeroSection-h1">Find Your Dream Job Easily</h1>
                    <p class="zeroSection-TXT">
                        Are you a seasoned professional or just starting your career?
                        We're here to help you find a job that suits your skills and
                        interests. Browse thousands of job openings across a variety of
                        industries and locations with just a few clicks.
                    </p>
                    <a href="/loginPage">
                        <button class="zero-SectionBTN">click me</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- container satu start -->
    <section>
        <div class="container-satuTXT">
            <h1 class="container-satu-h1">find your next company!</h1>
            <p class="container-satu-p">
                Browse company profiles to find the right workplace for you. Learn
                about jobs, reviews, company culture, benefits and perks.
            </p>
        </div>
        <!-- SLIDER start -->
        <div class="test">
            <div class="slider">
                <div class="slides" id="slides-container"></div>
            </div>
            
        </div>
        <p id="error-message" style="text-align: center; color: red; display: none;">
            Data perusahaan tidak tersedia.
        </p>
        <!-- SLIDER end -->
    </section>
    <!-- container satu end -->

    <!-- container dua start -->
    <section>
        <div class="container-dua">
            <div class="container-dua-isi">
                <img src="{{ asset('assets/zeroSectionIMG-02.png') }}" alt="" class="container-dua-img" />
                <div class="container-dua-txt">
                    <h1 class="container-dua-h1">“Hello” Karir yang lebih baik!</h1>
                    <p class="container-dua-p">Dapatkan karir impianmu disini</p>
                    <a href="">
                        <button class="container-dua-btn">
                            Dapatkan Tips dan Trik nya disini!
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- container dua end -->

    <!-- container tiga start -->
    <section>
        <div class="container-tiga">
            <div class="container-tiga-isi">
                <img src="{{ asset('assets/zeroSectionIMG-03.png') }}" alt="" class="container-tiga-img" />
                <div class="container-tiga-txt">
                    <h1 class="container-tiga-h1">
                        “Hello” Kandidat dengan pencocokan lebih baik!
                    </h1>
                    <p class="container-tiga-p">
                        Dapatkan kandidat karyawan perusahaan anda disini
                    </p>
                    <a href="">
                        <button class="container-tiga-btn">
                            Mulai Sekarang, Gratis!
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- container tiga end -->

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
    <script>
        window.apiData = {
            perusahaan: @json($dataPerusahaan),
        };
    </script>
    <script src="{{ asset('js/HomeBFLogin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
