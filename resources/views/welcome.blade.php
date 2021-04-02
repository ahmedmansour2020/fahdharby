@extends('layouts.layout')

@section('title', isset($title) ? $title : '')
@section('content')
@section('home')
    <?php $home = true; ?>
@endsection

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
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        موبايلات وتابلت
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        تيليفزيونات
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        إلكترونيات
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        المنزل و المطبخ
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        أجهزة منزلية
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        الصحة والجمال
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        الألعاب
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
                        الأمهات والأطفال
                    </a>
                </div>
            </div>
            <div class="bannerContainer">
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('resources/assets/images/Mask Group 20.png') }}" class="img-fluid"
                            alt="">
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
        <div class="fotorama text-center slide-header d-flex justify-content-center"  data-autoplay="true">
            <div  data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>
            <div  data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>
            <div  data-img="{{ URL::asset('resources/assets/images/Group 269.png') }}"><span></span></div>

            {{-- <img src="{{ URL::asset('resources/assets/images/Group 269.png') }}" class="img-fluid d-block w-100"
                alt="">
            <img src="{{ URL::asset('resources/assets/images/Group 269.png') }}" class="img-fluid d-block w-100"
                alt=""> --}}

        </div>
    </div>
</div>



@endsection
