<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/demo.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/media.css') }}">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('register') }}" class="form-login" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>إنشاء حساب كتاجر</h2>
                            <P class="mt-5 text-break">عن طريق</P>
                        </div>
                        <div class="social-form-register text-center mb-0" dir="ltr">
                            <!-- <a href="#" class="btn btn-info"><i class="fab fa-microsoft"></i></a> -->
                            <a href="#" class="btn btn-danger"><i class="fab fa-google"></i></a>
                            <!--  <a href="#" class="btn btn-info"><i class="fab fa-twitter"></i></a> -->
                            <a href="#" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="text-center text-break mt-5">أو</div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="w-100" name="name" placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group">
                                <input type="email" class="w-100" name="email" placeholder="البريد الألكتروني">
                            </div>
                            <div class="form-group">
                                <input type="password" class="w-100" name="password" placeholder=" كلمة المرور">
                            </div>
                            <div class="form-group">
                                <input type="password" class="w-100" name="password_confirmation"
                                    placeholder="تأكيد كلمة المرور">
                            </div>

                            <div class="row">
                                @foreach (App\Http\Controllers\DashboardController::genders() as $gender)
                                    <div class="col-6">
                                        <div class="group-radio">
                                            <input type="radio" name="gender" value="{{ $gender->id }}">
                                            <label for="gender">{{ $gender->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="acc-type">

                                <h4 class="head-acc">تحديد نوع الحساب</h4>
                                <div class="form-group-radio mt-4">
                                    <input type="radio" name="acc" class="ml-2">
                                    <label for="">فردي</label>
                                </div>
                                <div class="form-group-radio">
                                    <input type="radio" name="acc" class="ml-2">
                                    <label for="">شركة</label>
                                </div>

                            </div>
                            <h4 class="head-acc">صورة الهوية الوطنية</h4>

                            <div class="upload-id mt-4">
                                <label for="file-upload" class="custom-file-upload ml-4">
                                    + الوجه الأمامي
                                </label>
                                <input id="file-upload" type="file" />
                                <label for="file-upload" class="custom-file-upload">
                                    + الوجه الخلفي
                                </label>
                                <input id="file-upload" type="file" />
                            </div>

                            <div class="form-group mt-3">
                                <input type="number" placeholder="الرقم الوطني">
                            </div>
                            <div class="form-group input-tel">
                                <h4 class="head-acc">رقم الهاتف</h4>

                                <input id="phone" dir="ltr" name="mobile" type="tel">
                                <input type="text" placeholder="أدخل رمز التحقق" class="mt-4">
                            </div>
                            <div class="form-group mt-5">
                                <h4 class="head-acc">العنوان</h4>
                                <select name="" id="" class="mb-4 mt-5 select-country">
                                    <option value="" selected hidden>المدينة</option>
                                    <option value="الرياض" >الرياض</option>
                                    <option value="جدة" >جدة</option>
                                </select>
                                <input type="text" placeholder="المنطقة">
                                <input type="text" placeholder="الحي">
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary">أنشئ حسابك</button>

                            <div class="register-login text-center">
                                <p> هل لديك حساب بالفعل ! <a href="{{ route('login') }}">سجل الان</a> </p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

    <script>
        var type = 1;
        var $lat = 25.637181280126878;
        var $lng = 39.41930005645501;

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>
    <script src="{{ asset('resources/assets/js/content/location.js') }}"></script>
    <script src="{{ URL::asset('resources/assets/js/intlTelInput.js') }}"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "{{ URL::asset('resources/assets/js/utils.js') }}",
        });

    </script>

</body>

</html>
