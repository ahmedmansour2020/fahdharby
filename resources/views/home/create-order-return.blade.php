<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الطلبيات</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/style.css') }}">
</head>
<body>
    @include("layouts.navbar")

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


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script></script>
</body>
</html>