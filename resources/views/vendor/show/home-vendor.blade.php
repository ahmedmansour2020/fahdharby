@extends('vendor.layout.layout-vendor')
@section('title',isset($title)?$title:'')
@section('content') 


            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-be" >
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-lb">
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="box-numbers cl-gn" >
                            <h3>إجمالي المبيعات</h3>
                            <span>25</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="last-order">
                            <h3>اخر الطلبات</h3>
                        </div>
                    </div>
                    <div class="col-12 box-lastOrder">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="">
                                        <h4>رقم الطلب</h4>
                                        <p>12345</p>
                                    </div>
                                    <div class="">
                                        <h4>اسم العميل</h4>
                                        <p>محمود</p>
                                    </div>
                                    <div class="">
                                        <h4>الحالة</h4>
                                        <p>جديد</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="">
                                        <h4>تاريخ الطلب</h4>
                                        <p>12345</p>
                                    </div>
                                    <div class="">
                                        <h4>الكمية</h4>
                                        <p>3</p>
                                    </div>
                                    <div class="">
                                        <h4>الإجمالي</h4>
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 box-lastOrder">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="">
                                        <h4>رقم الطلب</h4>
                                        <p>12345</p>
                                    </div>
                                    <div class="">
                                        <h4>اسم العميل</h4>
                                        <p>محمود</p>
                                    </div>
                                    <div class="">
                                        <h4>الحالة</h4>
                                        <p>جديد</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="details-order">
                                    <div class="">
                                        <h4>تاريخ الطلب</h4>
                                        <p>12345</p>
                                    </div>
                                    <div class="">
                                        <h4>الكمية</h4>
                                        <p>3</p>
                                    </div>
                                    <div class="">
                                        <h4>الإجمالي</h4>
                                        <p>50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 

    @endsection

