@extends('layouts.layout')
@section('title',isset($title)?$title:'')
@section('content') 
@section('page_css')
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">
@endsection
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                @include("layouts.navbar-right")

            </div>
            <div class="col-sm-12 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="start-location">
                            <h2>تحديد العنوان</h2>

                            <form action="">
                                <div class="form-group">
                                    <input type="text" placeholder="الاسم الأول">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="اسم العائلة">

                                </div>
                                <div class="form-group">
                                    <input id="phone" name="phone" type="tel">
                                </div>

                                <p>تسمية العنوان</p>
                                <input type="radio" name="location">
                                <label for="">المنزل</label>
                                
                                <input type="radio" name="location">
                                <label for="">العمل</label>

                                <div class="group-btn">
                                    <button class="btn btn-primary btn-save" type="submit">حفظ العنوان</button>
                                    <button class="btn btn-back" type="button">رجوع</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">


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