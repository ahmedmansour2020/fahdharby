<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('vendor.layout.header')
    @yield('page_css')
    <script>
    var vendor_site = "{{route('vendor')}}";
    var home_site = "{{route('home')}}";
    </script>
</head>

<body>
    <div class="hidden">
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit" id="logout"></button>
        </form>
    </div>
    @include("vendor.layout.navbar-vendor")



    @yield('content')





    @include('vendor.layout.scripts')
    @yield('page_js')

</body>

</html>