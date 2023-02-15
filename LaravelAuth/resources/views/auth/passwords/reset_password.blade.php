@extends('layouts.app')
@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Click Here for Login</a>
    </div>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Reset Password Link</h3>
                            <form action="{{ route('resetpwd') }}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Enter Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" id="submit" name="submit"
                                    type="submit">Send Me Link</button>
                               
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
