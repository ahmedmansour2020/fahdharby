@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content')
@section('page_css')
<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">
@endsection
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12 mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form action="{{route('order.update',$id)}}" method="post" class="mt-3">
                    @method('PUT')
                    @csrf
                        <div class="start-location border p-3 bg-white overflow-hidden">
                            <table class="last-process-buy overflow-hidden">
                                <tr class="">
                                    <th colspan="2">إتمام عملية الشراء</th>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="payment_type" value="paypal" checked></td>
                                    <td>الدفع عن طريق <span class="text-left float-left d-inline-block">Paypal</span>
                                    </td>
                                    <td class="text-left"><img
                                            src="{{ URL::asset('resources/assets/images/paypal.png') }}"
                                            class="img-fluid" alt=""></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="payment_type" value="paypal"></td>
                                    <td>الدفع عن طريق <span class="text-left float-left d-inline-block">Paypal</span>
                                    </td>
                                    <td class="text-left"><img
                                            src="{{ URL::asset('resources/assets/images/paypal.png') }}"
                                            class="img-fluid" alt=""></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="payment_type" value="paypal"></td>
                                    <td>الدفع عن طريق <span class="text-left float-left d-inline-block">Paypal</span>
                                    </td>
                                    <td class="text-left"><img
                                            src="{{ URL::asset('resources/assets/images/paypal.png') }}"
                                            class="img-fluid" alt=""></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="payment_type" value="paypal"></td>
                                    <td>الدفع عن طريق <span class="text-left float-left d-inline-block">Paypal</span>
                                    </td>
                                    <td class="text-left"><img
                                            src="{{ URL::asset('resources/assets/images/paypal.png') }}"
                                            class="img-fluid" alt=""></td>
                                </tr>

                            </table>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary w-100 py-3"> <i
                                    class="fas fa-shopping-cart ml-3"></i>إتمام
                                عملية الشراء</button>
                        </div>
                    </form>
                </div>

                <!-- <div class="col-sm-12 col-md-5">
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
                                    <tr>
                                        <td>التقييم</td>
                                        <td>:</td>
                                        <td><img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                                class="img-fluid" alt=""><img
                                                src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                                class="img-fluid" alt=""> <img
                                                src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                                class="img-fluid" alt=""> <img
                                                src="{{ URL::asset('resources/assets/images/ic_star_24px.png') }}"
                                                class="img-fluid" alt="">
                                            <span class="amount-comments">1300 تعليق</span>
                                        </td>
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

                </div> -->
            </div>
        </div>

    </div>
</div>


@endsection
@section('page_js')
<script src="{{ URL::asset('resources/assets/js/intlTelInput.js') }}"></script>
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