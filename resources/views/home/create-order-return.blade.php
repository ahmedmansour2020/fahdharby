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
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="container-form">
                    <form action="" method="">
                        <div class="form-group">
                            <input type="text" placeholder="الأسم الأول">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="أسم العائلة">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="رقم الموبايل">
                        </div>
                        <input type="text" class="mr-l-42" placeholder="رقم الطلب">
                        <input type="date" class="pl-2" placeholder="تاريخ الطلب">
                        <div class="form-group">
                            <input type="text" placeholder="اسم المنتج">
                        </div>
                        <select name="" id="" class="mr-l-42">
                            <option value="0" disabled selected>نوع المنتج</option>
                            <option value="1">ألكترونيات</option>
                        </select>
                        <select name="" id="">
                            <option value="0" disabled selected>الكمية</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <div class="form-group">
                            <select name="" id="">
                                <option value="0" disabled selected>سبب الإرجاع</option>
                                <option value="1">منتج غير صحيح</option>
                                <option value="2">منتج تالف/به عيوب</option>
                            </select>
                        </div>
                        <div class="container-btn">
                            <a href="#">رجوع</a>
                            <button type="submit">إرسال</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    
@endsection