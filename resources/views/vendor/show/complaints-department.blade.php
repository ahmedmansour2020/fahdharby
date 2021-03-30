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
                        <h4>إدارة الشكاوي</h4>

                    </div>
                </div>
            </div>
            <div class="complaints-department">
                <img src="{{ URL::asset('resources/assets/images/Icon ionic-ios-happy.png') }}" alt="">
                <p>لا يوجد لديك أي شكاوي من المشترين  حاليا</p>
            </div>
        </div>
    </div>
</div>


@endsection