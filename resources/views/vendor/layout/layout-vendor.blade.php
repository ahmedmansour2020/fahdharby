<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('vendor.layout.header')
    @yield('page_css')
</head>
<body>
    @include("vendor.layout.navbar-vendor")



@yield('content')





@include('vendor.layout.scripts')
@yield('page_js')
  
</body>
</html>