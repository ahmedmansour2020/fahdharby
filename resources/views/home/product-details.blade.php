@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="product-details " dir="ltr">
                <div class="p-1 ">

                    <div class="fotorama" data-nav="thumbs">
                        @foreach($images as $image)
                        <img src="{{asset('uploaded/'.$image->name)}}" class="product__images">
                        @endforeach
                    </div>
                </div>
                <table class="float-right " dir="rtl">
                    <tbody>
                        <tr>
                            <td>الحالة</td>
                            <td>:</td>
                            <td>جديد</td>
                        </tr>
                        <tr>
                            <td>البائع</td>
                            <td>:</td>
                            <td>{{$supplier->name}}</td>
                        </tr>
                        <tr>
                            <td>التقييم</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" id="rate_star" value="{{$reviews_stars}}">
                                <div class="text-primary d-inline-block">
                                    <i class="far fa-star rate_star"></i>
                                    <i class="far fa-star rate_star"></i>
                                    <i class="far fa-star rate_star"></i>
                                    <i class="far fa-star rate_star"></i>
                                    <i class="far fa-star rate_star"></i>
                                </div>
                                <span class="amount-comments">{{count($reviews)}} تعليق</span></td>
                        </tr>
                        <tr>
                            <td>مكان الشحن</td>
                            <td>:</td>
                            <td>السعودية جدة</td>
                        </tr>
                        <tr>
                            <td>الكمية</td>
                            <td>:</td>
                            <td>{{$product->qty}}</td>
                        </tr>
                        <tr>
                            <td>مدة التوصيل</td>
                            <td>:</td>
                            <td>{{$product->duration}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="content-product-details">
                <div class="title-products d-flex flex-row justify-content-lg-between">
                    <h3>{{$product->name}}</h3>

                    @if($product->old_price!=null)
                    <span><del style="font-size:20px">{{$product->old_price}}$</del> <b class="text-success">{{$product->price}}$</b></span>
                    @else
                    <span>{{$product->price}}$</span>
                    @endif
                </div>
                <p>{{$product->description}}</p>
                <a data-id="{{$product->id}}" 
                    class="btn btn-primary w-100 py-3 @if($check_auth) add_to_cart @else login @endif @if($check_cart) disabled @endif">
                    @if($check_auth)
                    @if($check_cart)
                    المنتج موجود بالعربة
                    @else
                    أضف إلى سلة المشتريات
                    @endif
                    @else
                    سجل الدخول أولا
                    @endif
                </a>
            </div>
        </div>

        <div class="box-rates border p-4 w-100 mt-5 mb-5 col-12">
            <div class="row header-rates ">
                <div class="col-sm-12 col-md-6">
                    <h3>التقييمات</h3>

                </div>
                <div class="col-sm-12 col-md-6 d-flex about-vendor-dt">
                    <h4>

                        <img src="{{ URL::asset('resources/assets/images/Group-510.png') }}" class="img-fluid pl-2"
                            alt="">
                        البائع :
                    </h4>
                    <span name-vendor-pr>{{$supplier->name}}</span>
                    <span class="text-primary text-bold">بائع مميز</span>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <h2>نسبة التقييم</h2>

                </div>
                <div class="col-12 ">
                    <div class="star-rate d-inline-block">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="d-inline-block float-left">
                        <div class="status-rating">
                            <img src="{{ URL::asset('resources/assets/images/5.png') }}" alt="">
                            <span class="d-inline-block"
                                style="width: 500px; height: 10px; border-radius: 10px; background-color: #E4DEDE;">
                                <span class="d-block"
                                    style="width: 430px; height: 10px; border-radius: 10px; background-color: #306EFF; "></span>
                            </span>
                        </div>
                        <div class="status-rating">
                            <img src="{{ URL::asset('resources/assets/images/4.png') }}" alt="">
                            <span class="d-inline-block"
                                style="width: 500px; height: 10px; border-radius: 10px; background-color: #E4DEDE;">
                                <span class="d-block"
                                    style="width: 390px; height: 10px; border-radius: 10px; background-color: #306EFF; "></span>
                            </span>
                        </div>
                        <div class="status-rating">
                            <img src="{{ URL::asset('resources/assets/images/3.png') }}" alt="">
                            <span class="d-inline-block"
                                style="width: 500px; height: 10px; border-radius: 10px; background-color: #E4DEDE;">
                                <span class="d-block"
                                    style="width: 330px; height: 10px; border-radius: 10px; background-color: #306EFF; "></span>
                            </span>
                        </div>
                        <div class="status-rating">
                            <img src="{{ URL::asset('resources/assets/images/2.png') }}" alt="">
                            <span class="d-inline-block"
                                style="width: 500px; height: 10px; border-radius: 10px; background-color: #E4DEDE;">
                                <span class="d-block"
                                    style="width: 230px; height: 10px; border-radius: 10px; background-color: #306EFF; "></span>
                            </span>
                        </div>
                        <div class="status-rating">
                            <img src="{{ URL::asset('resources/assets/images/1.png') }}" alt="">
                            <span class="d-inline-block"
                                style="width: 500px; height: 10px; border-radius: 10px; background-color: #E4DEDE;">
                                <span class="d-block"
                                    style="width: 130px; height: 10px; border-radius: 10px; background-color: #306EFF; "></span>
                            </span>
                        </div>
                    </div>

                </div>


            </div>

            <div class="row mt-5">
                <div class="col-12">
                    @foreach($reviews as $review)
                    <div class="box-right mt-5">
                    <img class="review-avatar" @if($review->avatar!=null) src="{{asset('uploaded/'.$review->avatar)}}" @endif alt="">
                        <span class="name-user">{{$review->user}}</span>
                        <div class="date_rate">
                            <span class="date-rating-user">{{$review->date}}</span>
                            <div class="d-inline-block text-primary">
                                <i class="@if($review->rate>=1) fa @else far @endif fa-star"></i>
                                <i class="@if($review->rate>=2) fa @else far @endif fa-star"></i>
                                <i class="@if($review->rate>=3) fa @else far @endif fa-star"></i>
                                <i class="@if($review->rate>=4) fa @else far @endif fa-star"></i>
                                <i class="@if($review->rate>=5) fa @else far @endif fa-star"></i>
                            </div>
                        </div>
                        <p>{{$review->review}}</p>
                    </div>
                    @endforeach
                    @if($check_auth)
                    @if(!$check_review)
                    <hr>
                    <form method="POST" action="{{route('review.store')}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="rate" value="1" id="rate_value">
                        <div class="form-group row ">
                            <div class="col-6">
                                <textarea placeholder="اترك تعليق" name="review" class="form-control" rows="3"
                                    cols="5"></textarea>
                            </div>
                            <div class="col-4 text-warning">
                                {{-- <i data-value="1" class="rate fa fa-star-half"></i> --}}
                                <i data-value="1" class="rate fa fa-star"></i>
                                <i data-value="2" class="rate far fa-star"></i>
                                <i data-value="3" class="rate far fa-star"></i>
                                <i data-value="4" class="rate far fa-star"></i>
                                <i data-value="5" class="rate far fa-star"></i>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-info">ارسال</button>
                            </div>
                        </div>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="header-home-products mt-5">
                <h2>منتجات مشابهة</h2>
            </div>
        </div>
        @foreach($related_products as $item)
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="box-product latest-product">
                <a href="#" class="product-header d-block">
                    <img src="{{ $item->image }}" alt="">
                </a>
                <div class="product-body">
                    <a href="#" class="text-decoration-none">
                        <h4>{{$item->name}}</h4>

                    </a>
                    <div class="stars-rate">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    </div>
                    @if($item->old_price!=null)
                    <span><del style="font-size:20px">{{$item->old_price}}$</del> <b class="text-success">{{$item->price}}$</b></span>
                    @else
                    <span>{{$item->price}}$</span>
                    @endif
                    <p>{{$item->desciption}}</p>
                </div>
                <div class="product-footer">
                    <a data-id="{{$item->id}}"
                        class="btn btn-primary w-100  @if($check_auth) add_to_cart @else login  @endif @if($item->check_cart_related) disabled @endif">
                        @if($check_auth)
                        @if($item->check_cart_related)
                        المنتج موجود بالعربة
                        @else
                        أضف إلى سلة المشتريات
                        @endif
                        @else
                        سجل الدخول أولا
                        @endif
                    </a>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>

@endsection
@section('page_js')
<script src="{{asset('resources/assets/js/content/rate.js')}}"></script>
@endsection