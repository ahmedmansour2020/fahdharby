
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
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <a href="#" class="box-product">
                            <div class="product-header">
                                <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                            </div>
                            <div class="product-body">
                                <h4>مسخن كهربائي</h4>
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <span>50$</span>
                                <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                            </div>
                            <div class="product-footer">
                                <p>قيد الشراء</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <a href="#" class="box-product">
                            <div class="product-header">
                                <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                            </div>
                            <div class="product-body">
                                <h4>مسخن كهربائي</h4>
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <span>50$</span>
                                <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                            </div>
                            <div class="product-footer">
                                <p>قيد الشراء</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <a href="#" class="box-product">
                            <div class="product-header">
                                <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                            </div>
                            <div class="product-body">
                                <h4>مسخن كهربائي</h4>
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <span>50$</span>
                                <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                            </div>
                            <div class="product-footer">
                                <p>قيد الشراء</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <a href="#" class="box-product">
                            <div class="product-header">
                                <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                            </div>
                            <div class="product-body">
                                <h4>مسخن كهربائي</h4>
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <span>50$</span>
                                <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                            </div>
                            <div class="product-footer">
                                <p>قيد الشراء</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection