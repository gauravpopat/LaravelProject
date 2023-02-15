@extends('layouts.app')
@section('content')
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Change the password</h3>
                            <form action="{{ route('changemypassword') }}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="hidden" id="email" name="email" class="form-control form-control-lg"
                                        value="{{ $user->email }}"/>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Enter New Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg"/>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Re-Enter New Password</label>
                                    <input type="password" id="rpassword" name="rpassword" class="form-control form-control-lg"/>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" id="submit" name="submit"
                                    type="submit">Change Password</button>
                                <a href="{{route('goBack')}}" class="btn-block p-2">Cancle</a>
                            </form>
                            @if (Session::has('success'))
                                <p id="successmessage" style="text-align: center;color: green;">
                                    {{ Session::get('success') }} </p>
                            @endif
                            @if (Session::has('error'))
                                <p id="errormessage" style="text-align: center;color: red;">
                                    {{ Session::get('error') }}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
