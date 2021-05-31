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
                <div class="row">
                    <div class="col-12">
                        <div class="account-upgrade">
                            <a href="{{ route('register-vendor') }}">ترقية الحساب لتاجر</a>
                        </div>
                    </div>
                    <form action="" class="form-account-update">
                        <div class="fr-box">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label for="">الاسم الأول</label>
                                    <input type="text"  class="w-100">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label for="">اسم العائلة</label>
                                    <input type="text"  class="w-100">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label for="">اللغة</label>
                                    <select name="" id="" class="w-100">
                                        <option value="" selected>العربية</option>
                                    </select>
                                </div>
                            </div>
                            

                        </div>
                        <div class="sc-box">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label for="">الاسم الأول</label>
                                    <input type="text"  class="w-100">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label for="">اسم العائلة</label>
                                    <input type="text"  class="w-100">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="change-pass">
                                        <button class="btn-primary">تغيير كلمة المرور</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="save-changes">
                            <button class="btn btn-primary">حفظ التعديلات</button>
                        </div>
                    </form>
                    
                </div>
            </div>

        </div>
    </div>


@endsection