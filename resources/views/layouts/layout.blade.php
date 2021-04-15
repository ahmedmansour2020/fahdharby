<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script>
        var add_to_cart="{{route('add_to_cart')}}";
    </script>
    @include('layouts.header')
    @yield('page_css')
   
    @yield('home')
</head>
<body>
    <div class="hidden">

        <form  method="POST" action="{{route('logout')}}">
            @csrf
            <button id="logout" class="hidden"></button>
        </form>
    </div>
    @if(isset($home))
    @include("layouts.navbar-home")
    @else
    @include("layouts.navbar")
    @endif


@yield('content')





@include('layouts.scripts')
@yield('page_js')
  
</body>
</html>