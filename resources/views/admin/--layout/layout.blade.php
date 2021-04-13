<!doctype html>
<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
$lang=LaravelLocalization::setLocale();
?>
<html class="no-js" lang="zxx" @if($lang=='ar' ) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    @include('layout.header')

</head>

<body>

    {{-- navbar --}}
   
    {{-- end navbar --}}
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success w-100 text-center">
            {{ $message }}
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            {{ $message }}
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

    @yield('content')

    {{-- @include('layout.footer') --}}
    @yield('content_footer')
    @include('layout.scripts')
    @yield('page_js')


</body>

</html>