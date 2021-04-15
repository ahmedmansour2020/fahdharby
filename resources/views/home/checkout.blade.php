@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('home')
<?php
$home=true;

?>
@endsection
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
                        <div class="start-location border p-3 bg-white">
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <label for="">المدينة</label>
                                    <select name="" id="">
                                        <option value="">مكة</option>
                                        <option value="">مكة</option>
                                        <option value="">مكة</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">المنطقة</label>
                                    <select name="" id="">
                                        <option value="">الدمام</option>
                                        <option value="">الدمام</option>
                                        <option value="">الدمام</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">اسم ورقم الشارع</label>
                                    <select name="" id="">
                                        <option value="">مركز النور</option>
                                        <option value="">مركز النور</option>
                                        <option value="">مركز النور</option>
                                    </select>
                                </div>

                                

                                <p> العنوان</p>
                                <input type="radio" name="location">
                                <label for="">المنزل</label>
                                
                                <input type="radio" name="location">
                                <label for="">العمل</label>
                                <div class="form-group mt-3 write-ph">
                                    <input id="phone" name="phone" type="tel">
                                     <button class="btn" type="submit">تفعيل</button>
                                    <input type="text" class="code-phone" placeholder="رمز التعريف">
                                </div>

                                
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-5">
                        <div class="container-image-detailsProduct border mb-3 bg-white">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <img src="{{ URL::asset('resources/assets/images/31TYhN1uksL._AC_SY200_.png') }}"
                                        class="img-fluid" style="width: 30%; margin-left: 20px" alt="">
                                    <div class="d-inline-block title-products">
                                        <h3>خزانة حديثة</h3>
                                        <p>100$</p>
                                    </div>
        
                                </div>
                                <table class="float-right " dir="rtl">
                                    <tbody>
                                        <tr>
                                            <td>الحالة</td>
                                            <td>:</td>
                                            <td>جديد</td>
                                        </tr>
                                        <tr>
                                            <td>البائع</td>
                                            <td>:</td>
                                            <td class="text-primary">محمد خالد</td>
                                        </tr>
                                        <tr class="stars-table">
                                            <td>التقييم</td>
                                            <td>:</td>
                                            <td><img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                            class="img-fluid" alt=""><img
                                            src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid" alt="">
                                        <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid"
                                            alt=""> <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                            class="img-fluid" alt=""> <img
                                            src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}" class="img-fluid" alt="">
                                        <span class="amount-comments">1300 تعليق</span></td>
                                        </tr>
                                        <tr>
                                            <td>مكان الشحن</td>
                                            <td>:</td>
                                            <td>السعودية جدة</td>
                                        </tr>
                                        <tr>
                                            <td>الكمية</td>
                                            <td>:</td>
                                            <td>20</td>
                                        </tr>
                                        <tr>
                                            <td>مدة التوصيل</td>
                                            <td>:</td>
                                            <td>30</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            
                        </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237685.0692940347!2d39.986632624959036!3d21.435957143046686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c21b4ced818775%3A0x98ab2469cf70c9ce!2z2YXZg9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1615664104407!5m2!1sar!2seg" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <a href="#" class="btn btn-primary w-100 py-3">متابعة</a>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
@section('page_js')
    <script  src="{{ URL::asset('resources/assets/js/intlTelInput.js') }}"></script>
    <script>
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "{{ URL::asset('resources/assets/js/utils.js') }}",
      });
    </script>

@endsection