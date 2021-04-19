<?php
use App\Http\Controllers\UserController;
?>
@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')
@section('home')
<?php
$home=true;

?>
@endsection

<div class="container-fluid px-5 ">
    <div class="row h-100 siteWidthContainer ">

        <div class="bannerContainer h-100 col-lg-1 col-md-3 text-break ">
            <div class="row h-100 text-center">
                <div class="col-12 h-75">

                    <a href="{{route('to_all_categories')}}">
                        <img src="{{ URL::asset('resources/assets/images/Group 266.png') }}" class="category-img"
                            alt="">
                    </a>
                </div>
                <div class="col-12 h-25 ">
                    جميع التصنيفات
                </div>
            </div>
        </div>
        @foreach(UserController::getParentCategory(11) as $category)
        <div class="bannerContainer h-100 col-lg-1 col-md-3 text-break ">
            <div class="row h-100 text-center">
                <div class="col-12 h-75">

                    <a href="{{route('categories',$category->id)}}">
                        <img src="{{$category->image}}" class="category-img" alt="">
                    </a>
                </div>
                <div class="col-12 h-25 ">
                    {{$category->name}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="fotorama text-center slide-header d-flex justify-content-center align-items-center"
            data-autoplay="true">
            @foreach($sliders as $slider)
            <?php
            $color='#333333';
            $button_color='#333333';
            if($slider->color!=null){
                $color=$slider->color;
            }
            if($slider->button_color!=null){
                $button_color=$slider->button_color;
            }
            ?>
            <div class="slider-images " data-img="{{$slider->image}}">
                <div class='row h-100'>
                    <div class="col-3">
                        <div class=" mt-5 btn-container">
                            @if($slider->url!=null)
                            <a style="font-size:20px;font-weight:700;background:{{$button_color}}"
                                class="btn {{$slider->button_font}} px-5 py-2"
                                href="//{{$slider->url}}">{{$slider->button_title??'اضغط هنا'}}</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-9 p-5 ">
                        <span dir="rtl" class="display-4 font-weight-bold"
                            style="color:{{$color}}">{!!$slider->content!!}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="header-home-products mt-0">
                <h2>جميع التصنيفات</h2>
            </div>
        </div>
        @foreach(UserController::getParentCategory(6) as $category)
        <div class="col-sm-6 col-md-4">
            <a href="{{route('categories',$category->id)}}" class="box-home-category">
                <img src="{{$category->image }}" style="max-height:300px" class="img-fluid" alt="">
                <p>{{$category->name}}</p>
            </a>
        </div>
        @endforeach
        <div class="col-12">
            <div class="header-home-products">
                <h2>أحدث المنتجات</h2>
            </div>
        </div>

        <div class="owl-home owl-carousel owl-theme owl-loaded owl-drag" dir="ltr">
            @foreach($latest_products as $product)
            <div class="box-product latest-product item">
                <a href="{{route('product-details',$product->id)}}" class="product-header d-block">
                    <img src="{{$product->image }}" alt="">
                </a>
                <div class="product-body">
                    <a href="{{route('product-details',$product->id)}}" class="text-decoration-none">
                        <h4>{{$product->name}}</h4>
                    </a>
                    <div class="stars-rate" dir="rtl">
                        <input type="hidden" class="products_rates" value="{{$product->id}}">
                        <input type="hidden" id="rate_star_{{$product->id}}" value="{{$product->reviews_stars}}">
                        <div class="text-primary d-inline-block">
                            <i class="far fa-star rate_star_{{$product->id}}"></i>
                            <i class="far fa-star rate_star_{{$product->id}}"></i>
                            <i class="far fa-star rate_star_{{$product->id}}"></i>
                            <i class="far fa-star rate_star_{{$product->id}}"></i>
                            <i class="far fa-star rate_star_{{$product->id}}"></i>
                        </div>
                    </div>
                    @if($product->old_price!=null)
                    <span><del style="font-size:20px">{{$product->old_price}}$</del> <b class="text-success">{{$product->price}}$</b></span>
                    @else
                    <span>{{$product->price}}$</span>
                    @endif
                    <p>{{$product->description}}</p>
                </div>
                <div class="product-footer">
                    <a data-id="{{$product->id}}" 
                        class="btn btn-primary w-100  @if($check_auth) add_to_cart @else login @endif @if($product->check_cart_related) disabled @endif">
                        @if($check_auth)
                        @if($product->check_cart_related)
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
            @endforeach

        </div>




        <div class="col-12">
            <div class="header-home-products">
                <h2>عروض خاصة</h2>
            </div>
        </div>

        <div class="owl-home owl-carousel owl-theme owl-loaded owl-drag" dir="ltr">



            <!-- <div class="box-product latest-product item"> -->
            <div class="box-product  special-orders">
                <div class="product-header">
                    <img style="max-width:200px;max-height:200px" class="m-auto"
                        src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <span class="text-special-order">كاميرا عالية الدقة</span>
                    <span>50$</span>
                </div>
                <div class="product-footer">
                    <button type="button">اشتري الأن</button>
                </div>
            </div>
            <!-- </div> -->








            <!-- 
            <div class="box-product latest-product item">
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
            </div> -->
            <!-- <div class="box-product latest-product item">
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
            <div class="box-product latest-product item">
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
            <div class="box-product latest-product item">
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
            <div class="box-product latest-product item">
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

            <div class="box-product latest-product item">
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

            <div class="box-product latest-product item">
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
            </div> -->

        </div>
        {{--
    <div class="col-12">
        <div class="header-home-products">
            <h2>عروض خاصة</h2>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="box-product  special-orders">
            <div class="product-header">
                <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
    </div>
    <div class="product-body">
        <span class="text-special-order">كاميرا عالية الدقة</span>
        <span>50$</span>
    </div>
    <div class="product-footer">
        <button type="button">اشتري الأن</button>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
    <div class="box-product  special-orders">
        <div class="product-header">
            <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
        </div>
        <div class="product-body">
            <span class="text-special-order">كاميرا عالية الدقة</span>
            <span>50$</span>
        </div>
        <div class="product-footer">
            <button type="button">اشتري الأن</button>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
    <div class="box-product  special-orders">
        <div class="product-header">
            <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
        </div>
        <div class="product-body">
            <span class="text-special-order">كاميرا عالية الدقة</span>
            <span>50$</span>
        </div>
        <div class="product-footer">
            <button type="button">اشتري الأن</button>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-3">
    <div class="box-product  special-orders">
        <div class="product-header">
            <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
        </div>
        <div class="product-body">
            <span class="text-special-order">كاميرا عالية الدقة</span>
            <span>50$</span>
        </div>
        <div class="product-footer">
            <button type="button">اشتري الأن</button>
        </div>
    </div>
</div>
--}}


<div class="col-12">
    <div class="header-home-products">
        <h2>الأكثر مبيعا</h2>
    </div>
</div>

<div class="owl-home owl-carousel owl-theme owl-loaded owl-drag" dir="ltr">

    <div class="box-product latest-product item">
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
    <div class="box-product latest-product item">
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
    <div class="box-product latest-product item">
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
    <div class="box-product latest-product item">
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
    <div class="box-product latest-product item">
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

    <div class="box-product latest-product item">
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

    <div class="box-product latest-product item">
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

{{-- <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <div class="head-footer">
                            <h5>أقسام الموقع</h5>
                        </div>
                        <ul>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">الرئيسية</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}


</div>
</div>



@endsection
@section('page_js')
<script src="{{asset('resources/assets/js/content/rate.js')}}"></script>
@endsection