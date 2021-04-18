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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
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
            <li class="nav-item   dropdown">
                <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    فهد الحربي
                    <img src="{{URL::asset('resources/assets/images/ic_arrow_drop_down_24px.png')}}" class="img-fluid px-2" alt="">
                    <img src="{{URL::asset('resources/assets/images/Group 1225.png')}}" class="img-fluid px-2" alt="">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
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
            <a href="#" class="btn btn-chart bg-white border-primary ml-3 logout" style="color: #306EFF">تسجيل خروج </a>
            <a href="{{route($user->role_id==1?'admin':($user->role_id==2?'vendor':'dashboard'))}}" class="btn btn-chart bg-white border-primary ml-3" style="color: #306EFF;width:auto">الصفحة الشخصية</a>
            
            @endauth
        
        </ul>
        <a href="{{route('cart')}}" class="btn btn-primary btn-chart">سلة الشراء <img src="{{URL::asset('resources/assets/images/shopping-chart.png')}}" class="img-fluid" alt=""></a>
</nav>