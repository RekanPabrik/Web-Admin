<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="wellcomeContainer">
            <h1 class="wellcome-txt">Wellcome</h1>
            <h2 class="login-txt">log in to your account to continue</h2>
        </div>
        <div class="logo">
            <img src="/assets/logoRekanPabrik.png" alt="logo rekan pabrik">
        </div>
        <form action="/login" method="POST" class="form">
            @csrf

            <div class="emailInput">
                <input type="email" value="" name="email" id="emailUser" placeholder="your-email.com"
                    required>
            </div>
            <div class="passInput">
                <input type="password" value="" name="password" id="passUser" placeholder="your-password"
                    required>
            </div>
            <div class="btn">
                <a href="" class="cta-resetPass">
                    <p>Reset password</p>
                </a>
                <button class="login-btn" type="submit">login</button>
            </div>
        </form>
        <hr class="hr">
        <div class="loginWithGoogle">
            <button class="google-btn">
                <span class="flat-color-icons--google"></span>
                <span class="btn-text">Google</span>
            </button>

        </div>
        <div class="ContainerTermsTxt">
            <div class="TermsTXT">
                <p class="termsP">By clicking continue, you agree to our
                    <span class="terms-span">Terms of Service</span>
                    and
                    <span class="terms-span">Privacy Policy</span>
                </p>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="alamat">
            <h1 class="h1-address">Address</h1>
            <p class="p-address">
                Gedung Panehan Pasca Sarjana Lantai 1,Jl. Telekomunikasi Terusan Buah Batu, Bandung - 40257, Indonesia
            </p>
        </div>
        <div class="gambar">
            <img src="/assets/logoRekanPabrik.png" alt="logo rekan pabrik">
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
</body>

</html>
