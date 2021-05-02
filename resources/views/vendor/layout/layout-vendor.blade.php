<!DOCTYPE html>
<html lang="en">
<?php
$user = Illuminate\Support\Facades\Auth::user();
App\Http\Controllers\ProductController::arrange_offers_status();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('vendor.layout.header')
    @yield('page_css')
    <script>
    var vendor_site = "{{route('vendor')}}";
    var home_site = "{{route('home')}}";
    var admin_site = "{{route('admin')}}";
    var category_delete_image = "{{route('category_delete_image')}}";
    var slider_delete_image = "{{route('slider_delete_image')}}";
    var brand_delete_image = "{{route('brand_delete_image')}}";
    var change_product_status = "{{route('change_product_status')}}";
    var change_offer_status = "{{route('change_offer_status')}}";
    var change_coupones_status = "{{route('change_coupones_status')}}";
    var get_current_notifications = "{{route('get_current_notifications')}}";
    var change_slider_status = "{{route('change_slider_status')}}";
    var notification_seen = "{{route('notification_seen')}}";
    var language = "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json";
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

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3 pr-0">
                @if($user->role_id==1)
                @include("vendor.layout.navbar-right-admin")
                @else
                @include("vendor.layout.navbar-right-vendor")
                @endif
            </div>
          

            @yield('content')

        </div>
    </div>



    @include('vendor.layout.scripts')
    @yield('page_js')

</body>

</html>