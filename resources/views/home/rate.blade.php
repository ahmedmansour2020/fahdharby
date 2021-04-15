@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')
@section('page_css')
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">
@endsection
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="rate-products border p-3 bg-white" style="height: auto">
                        <form action="" class="mt-3">
                            
                            <h2>تقييم المنتح عند الاستلام</h2>
                            <p class="mt-3">كيف كان المنتج</p>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <div class="form-group mt-5">

                                <label for="">الملاحظات</label>
                                <textarea name="" id=""class="w-100 pr-3 pt-3" rows="6"></textarea>
                                <div class="btn-submit text-left">

                                    <button class="btn btn-primary mt-3 px-5">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


@endsection


