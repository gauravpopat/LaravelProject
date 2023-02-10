<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background: #f7f7f7;
        }

        .form-box {
            max-width: 500px;
            margin: auto;
            padding: 50px;
            background: #ffffff;
            border: 10px solid #f2f2f2;
        }

        h1,
        p {
            text-align: center;
        }

        input,
        textarea {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="form-box">
        <h1>Form</h1>

        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" value="{{old('name')}}">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="text" name="email" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="tel">Phone Number</label>
                <input class="form-control" id="phone" type="tel" name="phone" value="{{old('phone')}}">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
    </form>
    </div>
</body>

</html>
