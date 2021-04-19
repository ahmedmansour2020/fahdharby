<nav class="navbar navbar-expand-lg navbar-bg-white">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{URL::asset('resources/assets/images/logo.png')}}" class="img-fluid" alt="Logo">
        </a>
        <a href="{{route('home')}}" class="link-home">الرئيسية</a>
        <form action="" class="search">
            <input type="text" placeholder="ابحث  عن المنتج الذي تريده">
            <div class="search-icon">
                <img src="{{URL::asset('resources/assets/images/search.png')}}" class="img-fluid" alt="">
            </div>
        </form>
        <ul>
        <li class="nav-item notifications  dropdown">
                <a class="nav-link notifications dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{URL::asset('resources/assets/images/notifications.png')}}" alt="">
                </a>
                <div class="dropdown-menu dropdown-notifications" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-comment-dollar  pl-2"></i> تمت عملية شراء مسخن كهربائي بنجاح</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-comment-dollar  pl-2"></i> تمت عملية شراء مسخن كهربائي بنجاح</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-comment-dollar  pl-2"></i> تمت عملية شراء مسخن كهربائي بنجاح</a>
                </div>
            </li>
            <li class="nav-item  dropdown">
                <a class="nav-link language dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    العربية
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li>
            @guest
            <a href="#" class="btn btn-primary login btn-chart ml-3">تسجيل دخول</a>
            <a href="#" class="btn btn-chart bg-white border-primary ml-3" style="color: #306EFF">حساب جديد</a>
            @endguest
            @auth
            <?php
            $user=auth()->user();
            ?>
            <li class="nav-item   dropdown">
                <a class="nav-link  dropdown-toggle d-inline-block " style="font-size: 19px;font-weight: 700;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$user->name}}
                </a>
                <img src="{{URL::asset('resources/assets/images/Group 1225.png')}}" class="img-fluid px-1 d-inline-block" style="width: 25%"  alt="">

                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route($user->role_id==1?'admin':($user->role_id==2?'vendor':'dashboard'))}}"><i class="fas fa-user-alt pl-2 "></i>حسابي </a>
                    <a class="dropdown-item logout" href=""><i class="fas fa-user-alt pl-2 logout "></i>تسجيل الخروج </a>
                </div>
            </li>
            @endauth
        
        </ul>
        <a href="{{route('cart')}}" class="btn btn-primary btn-chart">سلة الشراء <img src="{{URL::asset('resources/assets/images/shopping-chart.png')}}" class="img-fluid" alt=""></a>
</nav>