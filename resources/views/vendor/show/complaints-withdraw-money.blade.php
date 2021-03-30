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
                        <h4>حالة عمليات السحب</h4>

                    </div>
                </div>
            </div>
            <div class="complaints-department">
                <img src="{{ URL::asset('resources/assets/images/dollar.png') }}" alt="">
                <p>لا يوجد لديك أي عمليات سحب أموال حاليا</p>
            </div>
        </div>
    </div>
</div>


@endsection