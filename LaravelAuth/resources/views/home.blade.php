<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Home Page</title>
    <style>
        body {
            background-color: #080524;

        }

        .center-div {
            margin: 0 auto;
            max-width: 700px;
            height: 100px;
            border-radius: 3px;
        }

        a.button3 {
            display: inline-block;
            padding: 0.3em 1.2em;
            margin: 0 0.3em 0.3em 0;
            border-radius: 2em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #FFFFFF;
            background-color: #4eb5f1;
            text-align: center;
            transition: all 0.2s;
        }

        a.button3:hover {
            background-color: #4095c6;
        }

        @media all and (max-width:30em) {
            a.button3 {
                display: block;
                margin: 0.2em auto;
            }
        }
    </style>
</head>

<body class="body">

    <div class="c">
    </div>
    <a href="{{ route('logout') }}" class="button3">Logout</a>
    <a href="{{ route('sendMailForChangePassword') }}" class="button3" id="changepassword">Change
        Password</a>
</body>

<script>
    $(document).ready(function() {
        $("#changepassword").click(function() {
            alert("Mail Sent.");
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
