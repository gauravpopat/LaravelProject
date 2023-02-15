@extends('layouts.app')
@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Click Here For
            Login</a>
    </div>
    <section class="vh-100" style="background-color: #508bfc;">


        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Registration</h3>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Enter Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        value="{{ old('email') }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $email }}</div>
                                    @enderror

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-lg" />
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                                @if (Session::has('success'))
                                    <p id="successmessage" style="text-align: center;color: green;">
                                        {{ Session::get('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                    <p id="errormessage" class="mb-5" style="text-align: center;color: red;">
                                        {{ Session::get('error') }}</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
