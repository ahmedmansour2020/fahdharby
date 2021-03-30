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
                <div class="col-sm-12 col-md-12">
                    <div class="section-search-product">
                        <h4>ملخص الحساب المالي</h4>

                    </div>
                </div>
            </div>
            <div class="financial-account">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="box-account">
                            <p>الرصيد الكلي</p>
                            <span class="text-account">00,00$</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="box-account">
                            <p>الرصيد المتاح</p>
                            <span >00,00$</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="box-account">
                            <p>الرصيد القيد التنفيذ</p>
                            <span >00,00$</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="box-account">
                            <p>الرسوم الإضافية</p>
                            <span >00,00$</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="box-account">
                            <p>الرصيد المسحوب</p>
                            <span >00,00$</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
</div>


@endsection