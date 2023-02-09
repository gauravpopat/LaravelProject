<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deleted Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="showDeletedRecordsModal" tabindex="-1" role="dialog"
        aria-labelledby="showDeletedRecordsModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showDeletedRecordsModalTitle">Deleted Records</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deleteddata as $dd)
                                <tr>
                                    <th scope="row">{{ $dd->id }}</th>
                                    <td>{{ $dd->name }}</td>
                                    <td><a onclick="return confirm('Are you sure?')"
                                            href="{{ route('restore', ['id' => $dd->id]) }}"
                                            class="btn  btn-secondary btn-block"> Restore </a></td>
                                    <td><a onclick="return confirm('Are you sure?')"
                                            href="{{ route('forcedelete', ['id' => $dd->id]) }}"
                                            class="btn btn-danger btn-block"> Force Delete </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" id="close">Close</button>

                    <button type="submit" class="btn btn-dark btn-block">
                        <a onclick="return confirm('Are you sure?')" href="{{ route('restoreAll') }}"
                            style="color: white; text-decoration: none;"> Restore All</a>
                    </button>
                </div>
                <button type="submit" class="btn btn-danger btn-block">
                    <a onclick="return confirm('Are you sure?')" href="{{ route('forceAll') }}"
                        style="color: white; text-decoration: none;"> Force Delete All</a>
                </button>
            </div>
        </div>
    </div>
    </div>
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
            $('#showDeletedRecordsModal').modal('show');
        });

        $('#close').on('click', function() {
            window.history.back();
        })
        $('.close').on('click', function() {
            window.history.back();
        })
        $(document).on('click', function(event) {
            if (event.target.id != "#showDeletedRecordsModal") {
                window.history.back();
            }
        })
    </script>
</body>

</html>
