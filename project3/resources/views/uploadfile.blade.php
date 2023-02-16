<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
</head>
<body>
    <form action="{{route('filestorage')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="file" placeholder="Upload File Here" >
    <br>
    <input type="submit" value="Upload">
    @if (Session::has('success'))
    <p style="text-align: left;color: rgb(2, 107, 2);">
        {{ Session::get('success') }}</p>
    @endif

    @if (Session::has('data'))
    <p style="text-align: left;color: rgb(41, 0, 91);">
        {{ "Data => ".Session::get('data') }}</p>
    @endif
    </form>
</body>
</html>