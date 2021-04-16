
@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content') 
@section('page_css')
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">
@endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            
            <div class="col-sm-12 col-lg-9 mt-5 @if(!$location) hidden @endif location">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="start-location">
                            <h2>تحديد العنوان</h2>

                            <form action="{{route('save_location')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <input type="text" name="city" value="{{$user->city}}" placeholder="المدينة">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="area" value="{{$user->area}}" placeholder="المنطقة">

                                </div>
                                <div class="form-group">
                                    <input type="text" name="street" value="{{$user->street}}" placeholder="الشارع">

                                </div>
                                <div class="form-group">
                                    <input id="phone" dir="ltr" name="mobile" value="{{$user->mobile}}" type="tel">
                                </div>
                                <input type="hidden" name="lng" id="lng" value="{{$user->map!=null?explode('/',$user->map)[0]:''}}">
                                <input type="hidden" name="lat" id="lat" value="{{$user->map!=null?explode('/',$user->map)[1]:''}}">
                                <p>تسمية العنوان</p>
                                <input type="radio" name="home_job" value="home" @if($user->home_job=='home') checked @endif @if($user->home_job==null) checked @endif >
                                <label for="">المنزل</label>
                                
                                <input type="radio" name="home_job" value="job" @if($user->home_job=='job') checked @endif >
                                <label for="">العمل</label>

                                <div class="group-btn">
                                    <button class="btn btn-primary btn-save" type="submit">حفظ العنوان</button>
                                    <!-- <button class="btn btn-back" type="button">رجوع</button> -->
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-9 mt-5 no-location @if($location) hidden @endif">
                <div class="row">
                    <div class="section-center">
                        <img src="{{URL::asset('resources/assets/images/Icon material-location-on.png')}}" class="img-fluid" alt="">
                        <h3>لم تحدد عنوان بعد</h3>
                        <button type="button" id="location" class="btn btn-primary">حدد عنوانك</button>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
@section('page_js')
<script>
var type=1;
var $lat=25.637181280126878;
var $lng=39.41930005645501;
</script>
    <script  src="{{ asset('resources/assets/js/content/location.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>
    <script  src="{{ URL::asset('resources/assets/js/intlTelInput.js') }}"></script>
    <script>
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
        utilsScript: "{{ URL::asset('resources/assets/js/utils.js') }}",
      });
    </script>

@endsection

