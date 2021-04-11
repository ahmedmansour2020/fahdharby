@extends('layouts.layout')
@section('title', isset($title) ? $title : '')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="product-details">
                    <div class="container-image-detailsProduct border mb-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <img src="{{ URL::asset('resources/assets/images/31TYhN1uksL._AC_SY200_.png') }}"
                                    class="img-fluid" style="width: 30%; margin-left: 20px" alt="">
                                <div class="d-inline-block title-products">
                                    <h3>خزانة حديثة</h3>
                                    <span>100$</span>
                                </div>
    
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <form action="">
                                    <label for="" class="d-block"><strong>الكمية</strong></label>
                                    <select name="" id="" style="width: 60px;
                                    border-radius: 5px;
                                    height: 38px;">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                    </select>
                                </form>
                            </div>
                            <ul class="list-unstyled pr-3 mt-5">
                                <li>الحالة: جديد</li>
                                <li>البائع: <span class="text-primary">فهد الحربي</span></li>
                                <li> التقييم:
                                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                        alt="">
                                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                        alt="">
                                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                        alt="">
                                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                        alt="">
                                    <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="amount-comments">1300 تعليق</span>
                                </li>
                                <li>مكان الشحن: السعودية جدة</li>
                                <li>الكمية: 25</li>
                                <li>مدة التوصيل: 3 أيام</li>
                            </ul>
                        </div>
                        
                        
                    </div>


                </div>
            </div>



            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="last-price border p-3">
                    <h3>السعر النهائي</h3>
                    <p>100$</p>
                </div>
                <a href="#" class="btn btn-primary w-100 py-3">إتمام عملية الشراء</a>
                <form action="">
                    <input type="text" class="mt-4 p-2" placeholder="أدخل كوبون الخصم">
                    <button class="btn btn-primary mr-4" type="submit">إضافة</button>
                </form>

                <div class="buttons-remove mt-4">
                    <button class="btn bg-white border border-dark p-2 px-3" type="button"><img src="{{ URL::asset('resources/assets/images/Icon material-delete.png') }}" class="img-fluid ml-2"
                        alt=""> إزالة من سلة المشتريات</button>
                    <button class="btn bg-white border border-dark p-2 px-3 mr-3" type="button">رجوع</button>

                </div>

            </div>



        </div>
    </div>

@endsection
