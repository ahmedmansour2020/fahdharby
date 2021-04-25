@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;
$user=auth()->user();
?>
@endsection
@section('content')
@section('page_css')
<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">
@endsection
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 mt-5">
            <form action="{{route('order.store')}}" method="post" class="mt-3">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="start-location border p-3 bg-white">
                            <div class="form-group">
                                <label for="">المدينة</label>
                                <input type="text" name="city" value="{{$user->city}}">
                            </div>
                            <div class="form-group">
                                <label for="">المنطقة</label>
                                <input type="text" name="area" value="{{$user->area}}">
                            </div>
                            <div class="form-group">
                                <label for="">اسم ورقم الشارع</label>
                                <input type="text" name="street" value="{{$user->street}}">
                            </div>

                            <input type="hidden" name="lng" id="lng"
                                value="{{$user->map!=null?explode('/',$user->map)[0]:''}}">
                            <input type="hidden" name="lat" id="lat"
                                value="{{$user->map!=null?explode('/',$user->map)[1]:''}}">

                            <p> العنوان</p>
                            <input type="radio" name="home_job" value="home" @if($user->home_job=='home') checked @endif>
                            <label for="">المنزل</label>

                            <input type="radio" name="home_job" value="job" @if($user->home_job=='job') checked @endif>
                            <label for="">العمل</label>
                            <div class="form-group mt-3 write-ph">
                                <input id="phone" name="mobile" value="{{$user->mobile}}" type="tel">
                                <button class="btn" type="submit">تفعيل</button>
                                <input type="text" class="code-phone" placeholder="رمز التعريف">
                            </div>

                            <input type="hidden" name="discount" value="{{$discount}}">

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="container-image-detailsProduct border mb-3 bg-white">
                            <div class="row w-100">
                                <table class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>المنتج</th>
                                            <th>السعر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <input type="hidden" name="items[]" multiple value="{{$product->id}}">
                                        <input type="hidden" name="qty_{{$product->id}}" value="{{$product->cart_qty}}">
                                        <input type="hidden" name="total_{{$product->id}}"
                                            value="{{$product->cart_qty*$product->price}}">
                                        <tr>
                                            <td class="text-success">{{$product->name}}</td>
                                            @if($product->old_price==null)
                                            <td>{{$product->cart_qty*$product->price}}$</td>
                                            @else
                                            <td><del>{{$product->cart_qty*$product->old_price}}$
                                                </del>{{$product->cart_qty*$product->price}}$</td>
                                            @endif
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row w-100 p-0 m-0">
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                </div>
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td class="text-primary">الإجمالي</td>
                                            <td id="subtotal">{{$subtotal}}$</td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary">الخصم</td>
                                            <td id="discount">{{$discount}}$</td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary">السعر النهائي</td>
                                            <td id="total">{{$total}}$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div class="my-2">
                            <div id="map"></div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">متابعة</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('page_js')
<script>
var type = 1;
var $lat = 25.637181280126878;
var $lng = 39.41930005645501;
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>
<script src="{{ URL::asset('resources/assets/js/intlTelInput.js') }}"></script>
<script src="{{ asset('resources/assets/js/content/location.js') }}"></script>
<script>
var input = document.querySelector("#phone");
window.intlTelInput(input, {
    utilsScript: "{{ URL::asset('resources/assets/js/utils.js') }}",
});
</script>

@endsection