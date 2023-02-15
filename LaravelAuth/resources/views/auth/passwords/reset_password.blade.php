<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <form action="{{route('resetpwd')}}" method="POST">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter Email For Reset Password">
        <br>
        <input type="submit" value="Send Me The Verification Link">
    </form>
</body>
</html>