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
                <div class="row product">
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="about-product">
                            <h4>مسخن كهربائي</h4>
                            <span>200$</span>
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="details-product">
                            <div class="name">
                                <span>البائع: </span>
                                <span>فهد الحربي </span>
                            </div>
                            <div class="date">
                                <span>تاريخ الشراء: </span>
                                <span>2/2/2020 </span>
                            </div>
                            <div class="location-user">
                                <span>مكان التوصيل: </span>
                                <span>السعودية مكة شارع ابن دمام </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product">
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="about-product">
                            <h4>مسخن كهربائي</h4>
                            <span>200$</span>
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="details-product">
                            <div class="name">
                                <span>البائع: </span>
                                <span>فهد الحربي </span>
                            </div>
                            <div class="date">
                                <span>تاريخ الشراء: </span>
                                <span>2/2/2020 </span>
                            </div>
                            <div class="location-user">
                                <span>مكان التوصيل: </span>
                                <span>السعودية مكة شارع ابن دمام </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product">
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="about-product">
                            <h4>مسخن كهربائي</h4>
                            <span>200$</span>
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" class="img-fluid" alt="">
                            <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="details-product">
                            <div class="name">
                                <span>البائع: </span>
                                <span>فهد الحربي </span>
                            </div>
                            <div class="date">
                                <span>تاريخ الشراء: </span>
                                <span>2/2/2020 </span>
                            </div>
                            <div class="location-user">
                                <span>مكان التوصيل: </span>
                                <span>السعودية مكة شارع ابن دمام </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    
@endsection