<!doctype html>
<html lang="en">

<head>
    <title>Upadate Customer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>



    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="updatemodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #343a40; color: white;">
                    <p class="modal-title" id="updatemodalLabel">Registration</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="text-shadow: white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Extended default form grid -->

                    <form action="{{url("/")}}/edit/{{$customer->id}}" method="POST" style="font-size: 12px;">
                        @csrf
                        <!-- Grid row -->

                        <!-- Default input -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Your Name" value="{{$customer->name}}" >
                        </div>


                        <!-- Grid row -->
                        <div class="form-row">
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Your Email" value="{{$customer->email}}">
                            </div>

                            <!-- Default input -->
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Your Number" value="{{$customer->phone}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="Enter Your City" value="{{$customer->city}}">
                            </div>

                            <!-- Default input -->
                            <div class="form-group col-md-6">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    placeholder="Enter Birthdate" value="{{$customer->dob}}">
                            </div>
                        </div>
                        <!-- Grid row -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-md" style="background-color: #343a40; color: white;" id="close">Close</button>
                            <button type="submit" class="btn btn-md"
                                style="background-color: #343a40; color: white;" >Update Me</button>
                        </div>

                    </form>
                    <!-- Extended default form grid -->
                </div>

            </div>
        </div>
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

    <script>
        $(document).ready(function() {
            $('#updatemodal').modal('show');
        });

     
        $('#close').on('click',function(){
            window.history.back();
        })
        $('.close').on('click',function(){
            window.history.back();
        })
    </script>

</body>


</html>
