@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-3">
            @include("layouts.navbar-right")

        </div>
        @if(count($products)>0)
        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
            <?php $index=0;?>
                @foreach($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-3  latest-product item">
                    <a href="{{route('product-details',$product->id)}}" class="product-header box-product">
                        <div class="product-header">
                            <img src="{{$product->image }}" alt="">
                        </div>
                        <div class="product-body">
                            <h4>{{$product->name}}</h4>
                            <div class="stars-rate" dir="rtl">
                                <input type="hidden" class="products_rates" value="{{$product->id.'-'.$index}}">
                                <input type="hidden" id="rate_star_{{$product->id.'-'.$index}}" value="{{$product->reviews_stars}}">
                                <div class="text-primary d-inline-block">
                                    <i class="far fa-star rate_star_{{$product->id.'-'.$index}}"></i>
                                    <i class="far fa-star rate_star_{{$product->id.'-'.$index}}"></i>
                                    <i class="far fa-star rate_star_{{$product->id.'-'.$index}}"></i>
                                    <i class="far fa-star rate_star_{{$product->id.'-'.$index}}"></i>
                                    <i class="far fa-star rate_star_{{$product->id.'-'.$index}}"></i>
                                </div>
                            </div>
                        <?php $index++;?>
                            @if($product->old_price!=null)
                            <span><del style="font-size:20px">{{$product->old_price}}$</del> <b
                                    class="text-success">{{$product->price}}$</b></span>
                            @else
                            <span>{{$product->price}}$</span>
                            @endif
                            <p>{{$product->description}}</p>

                        </div>
                        <div class="product-footer">
                            <p>قيد الشراء</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="section-center">
                    <img src="{{URL::asset('resources/assets/images/no-product.png')}}" class="img-fluid" alt="">
                    <h3>لا يوجد منتجات قيد شرائها</h3>
                    <a href="#" class="btn btn-primary">إبدا التسوق</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
@section('page_js')
<script src="{{asset('resources/assets/js/content/rate.js')}}"></script>
@endsection