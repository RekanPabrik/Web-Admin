<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('styles/resetPasswordPage.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Admin Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>

<body>
    {{-- CONTENT --}}
    <div class="main">
        <div class="login">
            <div class="img">
                <img class="logo" src="{{ asset('assets/logoRekanPabrik.png') }}" alt="RekanPabrik logo" />

            </div>
            <div class="errorMassage" id="errMassage">
                <div class="massage">
                    <p>Your password reset link is not valid, or already used.</p>
                </div>
            </div>
            <div class="linkTO" id="linkToLoginpage">
                <a href="/login">kembali ke login page</a>
            </div>
            <div class="input" id="inputContainer">
                <div class="container">
                    <form action="" method="POST" class="container">
                        @csrf
                        <div class="inputMail">
                            <label for="password">new password</label>
                            <input type="password" id="newPassword" name="password"
                                class="@error('password') is-invalid @enderror" required>
                        </div>
                        <div class="inputPass">
                            <label for="password">confirm Password</label>
                            <input type="password" id="confirmPass" name="password"
                                class="@error('password') is-invalid @enderror" required>
                        </div>
                        <div class="btn">
                            <button type="submit" id="resetPasswordBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/resetPasswordPage.js') }}"></script>
    <script>
        window.apiData = {
            token: @json($token),
            userData: @json($userData)
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
