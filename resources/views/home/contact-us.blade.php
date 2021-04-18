<?php
use App\Http\Controllers\UserController;
?>
@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('has_login')
<?php
$hasLogin=true;

?>
@endsection
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="header-contact-us">
                <h3>تواصل معنا</h3>
            </div>
            <img src="{{URL::asset('resources/assets/images/Group 1030.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <form action="" method="" class="form-contact">
                <div class="form-group">
                    <input type="text" name="Username" placeholder="الاسم الكامل">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="البريد الإلكتروني">
                </div>
                <div class="form-group">
                    <textarea cols="57" rows="15" class="pt-3" placeholder="نص الرسالة" style="padding-right: 40px"></textarea>
                </div>
            </form>
        </div>
        <div class="col-12 text-center mt-5">
            <button type="submit" class="btn btn-primary" style="width: 46%; height: 52px;">إرسال الرسالة</button>
        </div>
    </div>
</div>
    
@endsection