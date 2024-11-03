<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('styles/contactUs.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
    <!-- zero section start-->
    <section>
        <div class="zero-section">
            <div class="containerZeroSectionTXT">
                <h1 class="zeroSection-h1">Contact our team</h1>
                <div class="container swiper">
                    <div class="slider-wrapper">
                        <div class="card-list swiper-wrapper">
                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/rakean.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Rakean Jati</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>

                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/mika.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Mikail Radhi</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>

                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/irji.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Irji Syahrul</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>

                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/dapa.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Dafa Pradipa</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>

                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/rapip.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Rafif Purnomo</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>

                            <div class="card-item swiper-slide">
                                <img src="{{ asset('assets/nopal.jpeg') }}" alt="" class="user-image">
                                <h2 class="user-name">Naufal Baehaqy</h2>
                                <p class="user-profession">Front End Developer</p>
                                <button class="message-button">Message</button>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>

                        <div class="swiper-slide-button swiper-button-next"></div>
                        <div class="swiper-slide-button swiper-button-prev"></div>

                    </div>
                </div>
                <div class="description">
                    <h2>We’re Here to Help You!</h2>
                    <p class="zeroSection-TXT">
                        If you have any questions, feedback, or need assistance while using the Rekan Pabrik app, please
                        don’t hesitate to reach out to our dedicated support team.
                        We’re here to help you get the most out of our app, ensuring a smooth and productive
                        experience.Our team is ready to assist you with any inquiries, technical issues,
                        or general information you might need. Thank you for choosing Rekan Pabrik—we’re here to support
                        you every step of the way!
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- zero section end-->

    <!-- container 1 start -->
    <section>
        <div class="formContactUs">
            <form id="formContact">
                <div class="nameContainer">
                    <div class="firstName">
                        <label for="fname">First name:</label><br />
                        <input type="text" id="fname" name="fname" />
                        <span class="error" id="FnameError"></span>
                    </div>
                    <div class="lastName">
                        <label for="lname">Last name:</label><br />
                        <input type="text" id="lname" name="lname" />
                        <span class="error" id="LnameError"></span>
                    </div>
                </div>
                <div class="emailContainer">
                    <label for="email">email:</label><br />
                    <input type="email" name="email" id="email" />
                    <span class="error" id="emailError"></span>
                </div>
                <div class="numberContainer">
                    <label for="number">number:</label><br />
                    <input type="text" name="number" id="number" />
                    <span class="error" id="numberError"></span>
                </div>
                <div class="massageContainer">
                    <label for="number">message:</label><br />
                    <textarea name="massage" id="message"></textarea>
                    <span class="error" id="messageError"></span>
                </div>
                <button type="submit" class="btn-submit">Submit</button>
            </form>

        </div>
    </section>
    <!-- container 1 end -->

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script  src="{{ asset('js/contactUs.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
