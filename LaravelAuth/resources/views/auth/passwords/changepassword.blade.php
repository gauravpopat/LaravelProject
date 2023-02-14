<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter Old Password"><br>
        <input type="password" name="newpassword" id="newpassword" placeholder="Enter New Password"><br>
        <input type="submit" value="Change Password"><br>
    </form>
</body>
</html>