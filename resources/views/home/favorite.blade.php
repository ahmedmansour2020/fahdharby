@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;

?>
@endsection
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3 p-0">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <section class="money-back">
                            <h2>طريقة استرداد المال عند إلغاء أو ارجاع منتج</h2>
                            <div class="row mt-5">
                                <div class="mx-auto col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="container-money">
                                                <input type="radio" name="money">
                                                <img src="{{URL::asset('resources/assets/images/website.png')}}" class="img-fluid" alt="">
                                                <p class="title-money">الموقع</p>
                                                <p>أسرع طريقة لاسترداد قيمة المنتجات المسترجعة أو الملغاة لمحفظتك لرصيدك على الموقع</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="container-money">
                                                <input type="radio" name="money">
                                                <img src="{{URL::asset('resources/assets/images/vvisa.png')}}" class="img-fluid" alt="">
                                                <p class="title-money">البطاقة</p>
                                                <p>نطبق فقد عند الدفع بالبطاقة مسبقاً وقد تستغرق العملية ما بين ٧-١٤ يوم عمل ليظهرالمبلغ في حسابك</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </section>

                    </div>
                </div>
            </div>

        </div>
    </div>


    
@endsection