@extends('layouts.layout')
@section('title', isset($title) ? $title : '')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="product-details " dir="ltr">
                <div class="p-1 ">

                    <div  class="fotorama" data-nav="thumbs">
                    @foreach($images as $image)
                        <img  src="{{asset('uploaded/'.$image->name)}}" class="product__images">
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
                            <td><img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                            class="img-fluid" alt=""><img
                            src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                            alt=""> <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                            class="img-fluid" alt=""> <img
                            src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid" alt="">
                        <span class="amount-comments">1300 تعليق</span></td>
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
                    <span>{{$product->price}}$</span>
                </div>
                <p>{{$product->description}}</p>
                <a data-id="{{$product->id}}" href="{{route('redirect_to_product',$product->id)}}" 
                    class="btn btn-primary w-100 py-3 @if($check_auth) add_to_cart @endif @if($check_cart) disabled @endif">
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
                    <span name-vendor-pr>فهد الحربي</span>
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
                    <div class="box-right mt-5">
                        <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                        <span class="name-user">فهد</span>
                        <div class="date_rate">
                            <span class="date-rating-user">2/2/2020</span>
                            <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                        </div>
                        <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                    </div>
                    <div class="box-right mt-5">
                        <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                        <span class="name-user">فهد</span>
                        <div class="date_rate">
                            <span class="date-rating-user">2/2/2020</span>
                            <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                        </div>
                        <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                    </div>
                    <div class="box-right mt-5">
                        <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                        <span class="name-user">فهد</span>
                        <div class="date_rate">
                            <span class="date-rating-user">2/2/2020</span>
                            <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                        </div>
                        <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                    </div>
                    <div class="box-right mt-5">
                        <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                        <span class="name-user">فهد</span>
                        <div class="date_rate">
                            <span class="date-rating-user">2/2/2020</span>
                            <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                        </div>
                        <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="header-home-products mt-5">
                <h2>منتجات مشابهة</h2>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="box-product latest-product">
                <a href="#" class="product-header d-block">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </a>
                <div class="product-body">
                    <a href="#" class="text-decoration-none">
                        <h4>إبريق صيني</h4>

                    </a>
                    <div class="stars-rate">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    </div>
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="box-product latest-product">
                <a href="#" class="product-header d-block">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </a>
                <div class="product-body">
                    <a href="#" class="text-decoration-none">
                        <h4>إبريق صيني</h4>

                    </a>
                    <div class="stars-rate">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    </div>
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="box-product latest-product">
                <a href="#" class="product-header d-block">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </a>
                <div class="product-body">
                    <a href="#" class="text-decoration-none">
                        <h4>إبريق صيني</h4>

                    </a>
                    <div class="stars-rate">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    </div>
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection