<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ URL::asset('resources/css/style.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="" method="">
                    <div class="card">
                        <div class="card-header">
                            <h2>تسجيل الدخول كمستخدم جديد</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="البريد الألكتروني">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder=" كلمة المرور">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="تأكيد كلمة المرور">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="group-radio">
                                        <input type="radio" name="type">
                                        <label for="">ذكر</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="group-radio">
                                        <input type="radio" name="type">
                                        <label for="">انثى</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">أنشئ حسابك</button>
                            <p class="or">او</p>
                            <div class="login text-center">
                                <p> هل لديك حساب بالفعل ! <a href="{{route('login')}}">سجل الان</a> </p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script></script>
</body>
</html>