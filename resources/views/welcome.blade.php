@extends('layouts.layout')

@section('title', isset($title) ? $title : '')

@section('content')



<div class="container-fluid px-5">
    <div class="siteWidthContainer">
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Group 266.png') }}" class="img-fluid" alt="">
                    جميع التصنيفات
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    موبايلات وتابلت
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    تيليفزيونات
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    إلكترونيات
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    المنزل و المطبخ
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    أجهزة منزلية
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    الصحة والجمال
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    الألعاب
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    الأمهات والأطفال
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid" alt="">
                    الرياضة
                </a>
            </div>
        </div>
        <div class="bannerContainer">
            <div>
                <a href="#">
                    <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                        alt="">
                    الغذاء والمقبلات
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="fotorama text-center slide-header d-flex justify-content-center" data-autoplay="true">
            <div data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>
            <div data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>
            <div data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>

            {{-- <img src="{{ URL::asset('resources/assets/images/Group 269.png') }}" class="img-fluid d-block w-100"
                alt="">
            <img src="{{ URL::asset('resources/assets/images/Group 269.png') }}" class="img-fluid d-block w-100"
                alt=""> --}}

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="header-home-products">
                <h2>جميع التصنيفات</h2>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 3.png') }}" class="img-fluid" alt="">
                <p>شنط</p>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 4.png') }}" class="img-fluid" alt="">
                <p>ساعات</p>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 2.png') }}" class="img-fluid" alt="">
                <p>أحذية</p>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 3.png') }}" class="img-fluid" alt="">
                <p>شنط</p>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 4.png') }}" class="img-fluid" alt="">
                <p>ساعات</p>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="box-home-category">
                <img src="{{ URL::asset('resources/assets/images/Mask Group 2.png') }}" class="img-fluid" alt="">
                <p>أحذية</p>
            </a>
        </div>
        <div class="col-12">
            <div class="header-home-products">
                <h2>أحدث المنتجات</h2>
            </div>
        </div>

        <div class="owl-carousel owl-theme owl-loaded owl-drag" dir="ltr">
            <div class="box-product latest-product item ">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
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
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>كاميرا عالية الدقة</h4>
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
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>عطر نسائي</h4>
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
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
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
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>إبريق صيني</h4>
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
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
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




        <div class="col-12">
            <div class="header-home-products">
                <h2>عروض الأجهزة المحمولة</h2>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>كاميرا عالية الدقة</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>عطر نسائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>إبريق صيني</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>

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


        <div class="col-12">
            <div class="header-home-products">
                <h2>الأكثر مبيعا</h2>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>كاميرا عالية الدقة</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>عطر نسائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>إبريق صيني</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <span>50$</span>
                    <p>تستعمل هذه الكاميرا للتصوير الفوتوغرافي والإنتاج السينامائي</p>
                </div>
                <div class="product-footer">
                    <button type="button">أضف إلى سلة المشتريات</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <div class="box-product latest-product">
                <div class="product-header">
                    <img src="{{ URL::asset('resources/assets/images/camera.png') }}" alt="">
                </div>
                <div class="product-body">
                    <h4>مسخن كهربائي</h4>
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" alt="">
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
