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
            <!-- <li class="nav-item  dropdown">
                <a class="nav-link language dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    العربية
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li> -->
            <li class="nav-item   dropdown">
                <a class="nav-link nav-name-users  dropdown-toggle d-inline-block " style="font-size: 19px;font-weight: 700;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    فهد الحربي
                </a>
                <img src="{{URL::asset('resources/assets/images/Group 1225.png')}}" class="img-fluid px-1 d-inline-block" style="width: 25%"  alt="">

                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user-alt pl-2 "></i>حسابي </a>
                </div>
            </li>
        
        </ul>
        <a href="{{route('cart')}}" class="btn btn-primary btn-chart">سلة الشراء <img src="{{URL::asset('resources/assets/images/shopping-chart.png')}}" class="img-fluid" alt=""></a>
</nav>