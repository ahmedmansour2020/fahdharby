<?php
use App\Http\Controllers\UserController; ?>
@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')

    <div class="container search-results-content">
        <div class="row ">
            @foreach($products as $product)
            <div class="col-12 single-item">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 text-center col-image">
                        <a href="{{route('product-details',$product->id)}}" class="img-bucket"><img src="{{$product->image}}" alt=""></a>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <a href="{{route('product-details',$product->id)}}" class="title-product">
                            <h2 class="itemTitle">
                                {{$product->name}}

                            </h2>
                        </a>
                        <div class="content-products pr-3 mt-3">
                            <p>{!!$product->description!!}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 buy">
                        <ul class="list-blocks list-unstyled px-0 mt-3">
                            <li>
                                <div class="price-inline">
                                    <h3>{{$product->price}} $</h3>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('product-details',$product->id)}}" class="button btn btn-primary view-product-details mt-4">انقر هنا للمزيد من
                                    المعلومات</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            @endforeach
            <!-- <div class="col-12 single-item">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 text-center col-image">
                        <a href="#" class="img-bucket"><img src="{{ URL::asset('resources/assets/images/laptop.jpg') }}"
                                alt=""></a>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <a href="#" class="title-product">
                            <h2 class="itemTitle">

                                لينوفو لاب توب 15.6 inches,1.128 تيرابايت,رام 16 جيجابايت,ايه ام دي رايزن,دوس,ازرق - IdeaPad
                                Gaming 3 15ARH05

                            </h2>
                        </a>
                        <ul class="content-products pr-3 mt-3">
                            <li>نظام التشغيل: ويندوز 10 </li>
                            <li>نظام التشغيل: ويندوز 10</li>
                            <li>نظام التشغيل: ويندوز 10</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-3 buy">
                        <ul class="list-blocks list-unstyled px-0 mt-3">
                            <li>
                                <div class="price-inline">
                                    <h3>17,999.00 جنيه</h3>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="button btn btn-primary view-product-details mt-4">انقر هنا للمزيد من
                                    المعلومات</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-12 single-item">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 text-center col-image">
                        <a href="#" class="img-bucket"><img src="{{ URL::asset('resources/assets/images/laptop.jpg') }}"
                                alt=""></a>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <a href="#" class="title-product">
                            <h2 class="itemTitle">

                                لينوفو لاب توب 15.6 inches,1.128 تيرابايت,رام 16 جيجابايت,ايه ام دي رايزن,دوس,ازرق - IdeaPad
                                Gaming 3 15ARH05

                            </h2>
                        </a>
                        <ul class="content-products pr-3 mt-3">
                            <li>نظام التشغيل: ويندوز 10 </li>
                            <li>نظام التشغيل: ويندوز 10</li>
                            <li>نظام التشغيل: ويندوز 10</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-3 buy">
                        <ul class="list-blocks list-unstyled px-0 mt-3">
                            <li>
                                <div class="price-inline">
                                    <h3>17,999.00 جنيه</h3>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="button btn btn-primary view-product-details mt-4">انقر هنا للمزيد من
                                    المعلومات</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> -->


        </div>
    </div>



@endsection
