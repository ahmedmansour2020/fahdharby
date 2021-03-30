@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-3">

            @include("vendor.layout.navbar-right-vendor")

        </div>
        <div class="col-sm-12 col-lg-9 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="section-search-product">
                        <h4>التقييمات</h4>

                    </div>
                </div>
            </div>
            <div class="box-rate">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="box-right">
                            <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                            <span class="name-user">فهد</span>
                            <div class="date_rate">
                                <span class="date-rating-user">2/2/2020</span>
                                <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                            </div>
                            <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="box-left">
                            <button type="button" class="btn btn-danger"><img src="{{ URL::asset('resources/assets/images/Icon material-block.png') }}" alt="">حجب التعليق</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-rate">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="box-right">
                            <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                            <span class="name-user">فهد</span>
                            <div class="date_rate">
                                <span class="date-rating-user">2/2/2020</span>
                                <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                            </div>
                            <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="box-left">
                            <button type="button" class="btn btn-danger btn-remove"><img src="{{ URL::asset('resources/assets/images/Icon material-block.png') }}" alt="">حجب التعليق</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-rate">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="box-right">
                            <img src="{{ URL::asset('resources/assets/images/name.png') }}" alt="">
                            <span class="name-user">فهد</span>
                            <div class="date_rate">
                                <span class="date-rating-user">2/2/2020</span>
                                <img src="{{ URL::asset('resources/assets/images/Group 237.png') }}" alt="">
                            </div>
                            <p>منتج ممتاز وتسليم سريع وتعامل لبق</p>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="box-left">
                            <button type="button" class="btn btn-danger"><img src="{{ URL::asset('resources/assets/images/Icon material-block.png') }}" alt="">حجب التعليق</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection