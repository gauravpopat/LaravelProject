
@extends('displaycustomers')
@push('css')
    <link rel="stylesheet" href="./asset/css/mycss.css">
@endpush

@push('bootstrapcss')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endpush

@push('javascripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush