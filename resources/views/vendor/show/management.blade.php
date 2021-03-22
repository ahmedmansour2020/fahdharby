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
                          <a class="nav-link product-tab active" id="pills-product-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="true"> المنتجات المفعلة
                            <img src="{{ URL::asset('resources/assets/images/review.png') }}" alt="">
                            
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link review-tab" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">
                            قيد المراجعة
                            <img src="{{ URL::asset('resources/assets/images/review.png') }}" alt="">
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link sold-tab" id="pills-sold-tab" data-toggle="pill" href="#pills-sold" role="tab" aria-controls="pills-sold" aria-selected="false">
                            المباعة بالكامل
                            <img src="{{ URL::asset('resources/assets/images/sold.png') }}" alt="">
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link stop-tab" id="pills-stop-tab" data-toggle="pill" href="#pills-stop" role="tab" aria-controls="pills-stop" aria-selected="false">
                            المتوقفة مؤقتا
                            <img src="{{ URL::asset('resources/assets/images/stop.png') }}" alt="">
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link rejected-tab" id="pills-rejected-tab" data-toggle="pill" href="#pills-rejected" role="tab" aria-controls="pills-rejected" aria-selected="false">
                            المرفوضة
                            <img src="{{ URL::asset('resources/assets/images/rejected.png') }}" alt="">
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link expired-tab" id="pills-expired-tab" data-toggle="pill" href="#pills-expired" role="tab" aria-controls="pills-expired" aria-selected="false">
                            المنتهية الصلاحية
                            <img src="{{ URL::asset('resources/assets/images/expired.png') }}" alt="">
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
                            <div class="product-details">
                                <ul class="head-list-product list-unstyled">
                                    <li>الصورة</li>
                                    <li>العنوان</li>
                                    <li>السعر</li>
                                    <li>الكمية</li>
                                    <li>أخر تحديث</li>
                                    <li>مدة تجهيز المنتج</li>
                                    <li>تاريخ انتهاء الصلاحية</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="product-details">
                                <ul class="head-list-product list-unstyled">
                                    <li>الصورة</li>
                                    <li>العنوان</li>
                                    <li>السعر</li>
                                    <li>الكمية</li>
                                    <li>أخر تحديث</li>
                                    <li>مدة تجهيز المنتج</li>
                                    <li>تاريخ انتهاء الصلاحية</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                                <ul class="body-list-product list-unstyled">
                                    <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                    <li>مسخن كهربائي</li>
                                    <li>502$</li>
                                    <li>30</li>
                                    <li>2/2/2020</li>
                                    <li>4 أيام</li>
                                    <li>2/10/2020</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab"><div class="product-details">
                            <ul class="head-list-product list-unstyled">
                                <li>الصورة</li>
                                <li>العنوان</li>
                                <li>السعر</li>
                                <li>الكمية</li>
                                <li>أخر تحديث</li>
                                <li>مدة تجهيز المنتج</li>
                                <li>تاريخ انتهاء الصلاحية</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                        </div></div>
                        <div class="tab-pane fade" id="pills-stop" role="tabpanel" aria-labelledby="pills-stop-tab"><div class="product-details">
                            <ul class="head-list-product list-unstyled">
                                <li>الصورة</li>
                                <li>العنوان</li>
                                <li>السعر</li>
                                <li>الكمية</li>
                                <li>أخر تحديث</li>
                                <li>مدة تجهيز المنتج</li>
                                <li>تاريخ انتهاء الصلاحية</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                        </div></div>
                        <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab"><div class="product-details">
                            <ul class="head-list-product list-unstyled">
                                <li>الصورة</li>
                                <li>العنوان</li>
                                <li>السعر</li>
                                <li>الكمية</li>
                                <li>أخر تحديث</li>
                                <li>مدة تجهيز المنتج</li>
                                <li>تاريخ انتهاء الصلاحية</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                        </div></div>
                        <div class="tab-pane fade" id="pills-expired" role="tabpanel" aria-labelledby="pills-expired-tab"><div class="product-details">
                            <ul class="head-list-product list-unstyled">
                                <li>الصورة</li>
                                <li>العنوان</li>
                                <li>السعر</li>
                                <li>الكمية</li>
                                <li>أخر تحديث</li>
                                <li>مدة تجهيز المنتج</li>
                                <li>تاريخ انتهاء الصلاحية</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                            <ul class="body-list-product list-unstyled">
                                <li><img src="{{ URL::asset('resources/assets/images/img-product.png') }}" alt=""></li>
                                <li>مسخن كهربائي</li>
                                <li>502$</li>
                                <li>30</li>
                                <li>2/2/2020</li>
                                <li>4 أيام</li>
                                <li>2/10/2020</li>
                            </ul>
                        </div></div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection