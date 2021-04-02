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
                <div class="col-sm-12 col-md-2">
                    <div class="section-search-product">
                        <h4>المنتجات</h4>

                    </div>
                </div>
                <div class="col-sm-12 col-md-10">
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
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3 table-product" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="1" checked>
                            <a class="nav-link product-tab active" id="pills-product-tab" data-toggle="pill"
                                href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="true">
                                المنتجات المفعلة
                                <img src="{{ URL::asset('resources/assets/images/review.png') }}" alt="">

                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="2">
                            <a class="nav-link review-tab" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                role="tab" aria-controls="pills-review" aria-selected="false">
                                قيد المراجعة
                                <img src="{{ URL::asset('resources/assets/images/review.png') }}" alt="">
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="3">
                            <a class="nav-link sold-tab" id="pills-sold-tab" data-toggle="pill" href="#pills-sold"
                                role="tab" aria-controls="pills-sold" aria-selected="false">
                                المباعة بالكامل
                                <img src="{{ URL::asset('resources/assets/images/sold.png') }}" alt="">
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="4">
                            <a class="nav-link stop-tab" id="pills-stop-tab" data-toggle="pill" href="#pills-stop"
                                role="tab" aria-controls="pills-stop" aria-selected="false">
                                المتوقفة مؤقتا
                                <img src="{{ URL::asset('resources/assets/images/stop.png') }}" alt="">
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="5">
                            <a class="nav-link rejected-tab" id="pills-rejected-tab" data-toggle="pill"
                                href="#pills-rejected" role="tab" aria-controls="pills-rejected" aria-selected="false">
                                المرفوضة
                                <img src="{{ URL::asset('resources/assets/images/rejected.png') }}" alt="">
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <input type="radio" name="tabs" class="hidden" value="6">
                            <a class="nav-link expired-tab" id="pills-expired-tab" data-toggle="pill"
                                href="#pills-expired" role="tab" aria-controls="pills-expired" aria-selected="false">
                                المنتهية الصلاحية
                                <img src="{{ URL::asset('resources/assets/images/expired.png') }}" alt="">
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-product" role="tabpanel"
                            aria-labelledby="pills-product-tab">
                            <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-activated">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                        <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-in_process">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab">
                        <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-selled">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-stop" role="tabpanel" aria-labelledby="pills-stop-tab">
                        <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-stopped">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-rejected" role="tabpanel"
                            aria-labelledby="pills-rejected-tab">
                            <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-rejected">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-expired" role="tabpanel"
                            aria-labelledby="pills-expired-tab">
                            <div class="product-details table-responsive">
                                <table class="table-management products w-100" id="datatable-expired">
                                    <thead>
                                        <tr>
                                            <th>الصورة</th>
                                            <th>العنوان</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>أخر تحديث</th>
                                            <th>مدة تجهيز المنتج</th>
                                            <th>تعديل|حذف</th>
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
        </div>
    </div>
</div>

@endsection
@section('page_js')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('resources/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('resources/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="{{asset('resources/assets/js/content/products.js')}}"></script>
<script src="{{asset('resources/assets/js/content/remove.js')}}"></script>
@endsection