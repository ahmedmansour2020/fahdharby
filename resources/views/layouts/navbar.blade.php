<!-- <nav class="navbar navbar-expand-lg navbar-bg-white">

    <a href="{{ route('home') }}" class="link-home">الرئيسية</a>
    <form action="" class="search">
        <input type="text" placeholder="ابحث  عن المنتج الذي تريده">
        <div class="search-icon">
            <img src="{{URL::asset('resources/assets/images/search.png')}}" class="img-fluid" alt="">
        </div>
    </form>
    <ul>

         <li class="nav-item  dropdown">
                <a class="nav-link language dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    العربية
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li> 

    </ul>

</nav> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{URL::asset('resources/assets/images/logo.png')}}" class="img-fluid" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form action="" class="search">
            <input type="text" placeholder="ابحث  عن المنتج الذي تريده">
            <div class="search-icon">
                <img src="{{URL::asset('resources/assets/images/search.png')}}" class="img-fluid" alt="">
            </div>
        </form>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item notifications  dropdown">
                <a class="nav-link notifications dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{URL::asset('resources/assets/images/notifications.png')}}" alt="">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>
        </ul>
        <a href="{{route('cart')}}" class="btn btn-primary btn-chart">سلة الشراء <img src="{{URL::asset('resources/assets/images/shopping-chart.png')}}" class="img-fluid" alt=""></a>
    </div>
</nav>