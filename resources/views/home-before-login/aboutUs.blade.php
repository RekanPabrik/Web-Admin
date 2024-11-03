<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('styles/aboutUs.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
                    <a href="#" class="nav-a">for the company</a>
                </li>
                <li class="nav-li">
                    <a href="/contactUS" class="nav-a">contact Us</a>
                </li>
                <a href="/loginPage" class="nav-a"><button class="lgn-btn">Log
                        in</button></a>
            </ul>
        </nav>
    </header>
    <!-- navbar end -->

    <!-- zero section start-->
    <section>
        <div class="zero-section">
            <div class="zero-section-container">
                <img src="{{ asset('assets/logoRekanPabrik.png') }}" alt="" class="img-zeroSection" />
                <div class="containerZeroSectionTXT">
                    <h1 class="zeroSection-h1">About <span>RekanPabrik</span></h1>
                    <p class="zeroSection-TXT">
                        At Factory Partners, we believe that every individual has great
                        potential to thrive in the world of work. As a platform that
                        focuses on the industrial and manufacturing sectors, we are here
                        to bridge job seekers with leading companies in this field.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- zero section end-->

    <!-- container 1 start -->
    <section>
        <div class="containerSatu">
            <div class="containerSatu-TXT">
                <h1>our mission</h1>
                <p>
                    We aim to be the best partner for job seekers and companies. By
                    providing access to relevant job vacancies and helping companies
                    find quality talent, Factory Associates is committed to building a
                    strong and sustainable employment ecosystem.
                </p>
            </div>
        </div>
    </section>
    <!-- container 1 end -->

    <!-- container 2 start -->
    <section>
        <div class="containerDua">
            <div class="containerDua-TXT">
                <h2>Why Factory Partners?</h2>
                <ul>
                    <li>
                        Industry Specific: Our focus on the manufacturing and industrial
                        sectors ensures you find the most relevant vacancies.
                    </li>
                    <li>
                        Partnerships with Leading Companies: We work with major companies
                        to provide the best job opportunities.
                    </li>
                    <li>
                        Easy & Fast Process: From search to application, the process is
                        simple and fast, making it easy for you to take the next step in
                        your career.
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- container 2 end -->

    <!-- container Tiga start -->
    <section>
        <div class="container-Tiga">
            <div class="container-Tiga-isi">
                <img src="{{ asset('assets/zeroSectionIMG-04.png') }}" alt="" class="container-Tiga-img" />
                <div class="container-Tiga-txt">
                    <h1 class="container-Tiga-h1">With Us, Achieve Your Best Career!</h1>
                    <p class="container-Tiga-p">Join Factory Associates and find the career opportunity that's right for
                        you.
                        Let's grow and develop together in an industry that continues to develop.</p>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <!-- container Tiga end -->

    <!-- Slider Card bergerak -->
    <div class="slider-container">
        <div class="card-container" id="card-container">

        </div>
        <p id="error-message" style="display: none;  text-align: center;">Not Found</p>
    </div>

    <!-- footer start -->
    <footer class="footer">
        <div class="alamat">
            <h1 class="h1-address">Address</h1>
            <p class="p-address">
                Gedung Panehan Pasca Sarjana Lantai 1,Jl. Telekomunikasi Terusan Buah
                Batu, Bandung - 40257, Indonesia
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

    <script src="{{ asset('js/aboutUs.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
