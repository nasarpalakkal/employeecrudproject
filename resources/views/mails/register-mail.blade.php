<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Confirmation</title>
</head>
<body>

    <p>Hi {{$register->name}}</p>

    <p>Your account has been created.</p>

    <p>Your Password is :- <strong> {{ $register->randompassword }}</strong></p>

</body>
</html>
