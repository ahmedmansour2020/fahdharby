@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <nav class="navTabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">تم إرجاعها </a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">قيد الإرجاع</a>
                      <a href="{{ url('/create-order-return') }}" class="btn btn-create-order">إنشاء طلب إرجاع لمنتج</a>
                    </div>
                </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active return-product" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <img src="{{URL::asset('resources/assets/images/icon-return.png')}}" class="img-fluid" alt="">
                        <h3>لا يوجد منتجات تم إرجاعها</h3>
                    </div>
                    <div class="tab-pane fade return-product" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <img src="{{URL::asset('resources/assets/images/icon-return.png')}}" class="img-fluid" alt="">
                        <h3>لا يوجد منتجات قيد الإرجاع</h3>
                    </div>
                  </div>
            </div>

        </div>
    </div>


    
@endsection