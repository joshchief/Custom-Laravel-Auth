<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <h1>Forgot Password Email</h1>

    <h2>You can reset your password from link below:</h2>
    <p><a href="{{ route('reset.password.get', $token) }}">Reset Password</a></p>
</body>
</html>