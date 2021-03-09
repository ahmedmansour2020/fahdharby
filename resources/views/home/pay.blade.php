@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="section-center">
                        <img src="{{URL::asset('resources/assets/images/pay.png')}}" class="img-fluid" alt="">
                        <h3>لا يوجد أي مشتريات سابقة</h3>
                        <a href="#" class="btn btn-primary">إبدا التسوق</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    
@endsection