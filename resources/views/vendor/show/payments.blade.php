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
                <div class="col-sm-12 col-md-3">
                    <div class="section-search-product">
                        <h4>المدفوعات المتكررة</h4>

                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="section-search-product">
                        <form action="">
                            <div class="form-group">
                                <input type="text" placeholder="ابحث  عن اسم المنتج أو نوعه أو تصنيفه">
                                <div class="icon-search">
                                    <img src="{{ URL::asset('resources/assets/images/search.png') }}" alt="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <ul class="head-list-payment list-unstyled">
                    <li>رقم المدفوعة المتكررة</li>
                    <li>رقم الطلب</li>
                    <li>مرجع الدفع</li>
                    <li>اسم العميل</li>
                    <li>الحالة</li>
                    <li>تاريخ الطلب </li>
                </ul>
                <ul class="body-list-payment list-unstyled">
                    <li>5260</li>
                    <li>20</li>
                    <li>الحساب</li>
                    <li>محمد</li>
                    <li>تم</li>
                    <li>2/2/2020</li>
                </ul>
                <ul class="body-list-payment list-unstyled">
                    <li>5260</li>
                    <li>20</li>
                    <li>الحساب</li>
                    <li>محمد</li>
                    <li>تم</li>
                    <li>2/2/2020</li>
                </ul>
                <ul class="body-list-payment list-unstyled">
                    <li>5260</li>
                    <li>20</li>
                    <li>الحساب</li>
                    <li>محمد</li>
                    <li>تم</li>
                    <li>2/2/2020</li>
                </ul>
                <ul class="body-list-payment list-unstyled">
                    <li>5260</li>
                    <li>20</li>
                    <li>الحساب</li>
                    <li>محمد</li>
                    <li>تم</li>
                    <li>2/2/2020</li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection