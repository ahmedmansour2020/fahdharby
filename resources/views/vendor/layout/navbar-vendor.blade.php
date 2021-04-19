
    <section class="navbar-vendor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{URL::asset('resources/assets/images/logo-vendor.png')}}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="col-10">
                    <ul>
                        <li class="nav-item notification-vendor  dropdown">
                            <a class="nav-link notification-vendor dropdown-toggle position-relative" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{URL::asset('resources/assets/images/notification-vendor.png')}}" alt="">
                                <span class="notify-alarm">{{App\Http\Controllers\NotificationController::get_user_notifications()['count']}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-notification" aria-labelledby="navbarDropdown">
                            @foreach(App\Http\Controllers\NotificationController::get_user_notifications()['notifications'] as $notification)
                                <a class="dropdown-item notify @if($notification->status==0) alert-primary @endif text-center" data-id="{{$notification->id}}" href="{{$notification->url}}">{{$notification->content}}</a>
                            @endforeach
                            </div>
                        </li>
            
                        <li class="nav-item  dropdown profile-vendor float-left">
                            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               {{auth()->user()->name}}
                                <img src="{{URL::asset('resources/assets/images/arrow-down.png')}}" class="mr-2 ml-2" alt="">
                                <img src="{{URL::asset('resources/assets/images/icon-profile.png')}}"  alt="">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">الملف الشخصي</a>
                                <a class="dropdown-item logout" href="" >تسجيل الخروج</a>
                            </div>
                        </li>
                    
                    </ul>
                </div>
            </div>

        

        </div>

    </section>

