<?php
use App\Http\Controllers\UserController;
?>
@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="header-sub-category mt-5">
                    <h2>الالكترونيات</h2>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="#" class="box-home-category" >
                    <img src="{{URL::asset('resources/assets/images/ar_cat-05.png')}}" style="max-height:300px" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="#" class="box-home-category" >
                    <img src="{{URL::asset('resources/assets/images/ar_cat-06.png')}}" style="max-height:300px" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a href="#" class="box-home-category" >
                    <img src="{{URL::asset('resources/assets/images/ar_cat-07.png')}}" style="max-height:300px" class="img-fluid" alt="">
                </a>
            </div>

        </div>
    </div>


    
@endsection