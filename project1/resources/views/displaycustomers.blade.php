<!doctype html>
<html lang="en">

<head>
    <style>
        div tbody tr {
            animation-name: backchange;
            animation-duration: 40s;
            animation-iteration-count: infinite;
        }

        @keyframes backchange {
            0% {
                background-color: rgb(255, 255, 255);
                color: black;
            }

            33% {
                background-color: rgb(0, 0, 0);
                color: white;
            }

            66% {
                background-color: rgb(255, 255, 255);
                color: black;
            }

            100% {
                background-color: rgb(0, 0, 0);
                color: white;
            }
        }
    </style>
    <title>Customer Detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div id="div" class="row h-100 d-flex align-items-center justify-content-center" style="padding:6%;">
        <table class="table">
            <h4>Customer Details</h4>
        </table>

        <div class="col-md-4 col-lg-2">
            <a class="btn btn-dark btn-block table" href="{{ route('restoredata') }}" style=" position: sticky;top: 0;">
                Show Deleted Records </a>
        </div>

        @if (\Session::has('error'))
            <ul id="ul">
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        @endif

        <div class="table table-responsive" style="width:100%">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="3" style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->status }}</td>
                            <td><a href="{{ route('update', ['id' => $customer->id]) }}"
                                    style="color: rgb(0, 0, 240); text-decoration: none;"> Update </a></td>
                            <td><a onclick="return confirm('Are you sure?')"
                                    href="{{ route('delete', ['id' => $customer->id]) }}"
                                    style="color: red; text-decoration: none;"> Delete </a></td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <a onclick="return confirm('Are you sure?')" href="{{ route('deleteAll') }}"
            style="color: red; text-decoration: none;"> Delete All</a>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
