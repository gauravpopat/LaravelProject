<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <form action="{{route('changemypassword')}}" method="POST">
        @csrf   
        <input type="hidden" name="email" id="email" value=" {{$user->email}}" >
    <br>
    <input type="password" name="password" id="password" placeholder="Enter New Password">
    <br>
    <input type="password" name="repassword" id="repassword" placeholder="Re Rnter Password">
    <br>
    <input type="submit" value="Change Password">
</form>
</body>
</html>