@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12 mt-5">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="box-product">
                            <div class="product-header">
                                <img src="{{URL::asset('resources/assets/images/product-1.png')}}" alt="">
                            </div>
                            <div class="product-body">
                                <h4>{{$product->name}}</h4>
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <img src="{{URL::asset('resources/assets/images/ic_star_24px.png')}}" alt="">
                                <span>{{$product->price}}$</span>
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="product-footer">
                                <a href="#">اتمام الشراء</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


@endsection