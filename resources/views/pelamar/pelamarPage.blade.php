<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>INI PAGE PELAMAR

    </h1>
    @if (isset($user))
        <h2>Welcome</h2>
        <p>{{ $user['first_name'] }} {{ $user['last_name'] }}</p>
        <p>Your role: {{ $user['role'] }}</p>
    @else
        <p>User data not available.</p>
    @endif
</body>

</html>
