@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content')

<div class="col-sm-12 col-lg-9 mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="section-search-product">
                <h4>الطلبات</h4>

            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="section-search-product">
                <form action="">
                    <div class="form-group">
                        <input id="search" type="text" placeholder="ابحث  عن اسم المنتج أو نوعه أو تصنيفه">
                        <div class="icon-search">
                            <img src="{{ URL::asset('resources/assets/images/search.png') }}" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3 table-product" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <input type="radio" name="tabs" class="hidden" value="0" >
                    <a class="nav-link product-tab " id="pills-product-tab" data-toggle="pill"
                        href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="true"> الطلبات
                        المنتظرة

                    </a>
                </li>

                <li class="nav-item" role="presentation">
                <input type="radio" name="tabs" class="hidden" value="1" checked>
                    <a class="nav-link sold-tab active" id="pills-sold-tab" data-toggle="pill" href="#pills-sold" role="tab"
                        aria-controls="pills-sold" aria-selected="false">
                        المؤكدة
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                <input type="radio" name="tabs" class="hidden" value="2" >
                    <a class="nav-link review-tab" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                        role="tab" aria-controls="pills-review" aria-selected="false">
                        المشحونة
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                <input type="radio" name="tabs" class="hidden" value="3" >
                    <a class="nav-link stop-tab" id="pills-stop-tab" data-toggle="pill" href="#pills-stop" role="tab"
                        aria-controls="pills-stop" aria-selected="false">
                        المستلمة
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="product-details table-responsive">
                    <table class="table-management  w-100" id="orders_status">
                        <thead>
                            <tr>
                                <th>الصورة</th>
                                <th>الصنف</th>
                                <th>رقم الطلب</th>
                                <th>اسم العميل</th>
                                <th>الحالة</th>
                                <th>تاريخ الطلب</th>
                                <th>الكمية</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('page_js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/orders.js')}}"></script>

@endsection