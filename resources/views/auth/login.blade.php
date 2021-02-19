<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
$lang=LaravelLocalization::setLocale();
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('resources/assets/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{__('login.login')}}</h2>
                    <!--                         <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Login</span>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <div class="checkout__form">
            <form method="POST" action="{{ route('login') }}">
                <x-jet-validation-errors class="mb-4" />
                <div class="row justify-content-center @if($lang=='ar') text-right @endif">

                    <div class="col-md-4">



                        @csrf
                        <div class="checkout__input">
                            <p>{{__('login.email')}}<span>*</span></p>
                            <input type="email" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp" placeholder="{{__('login.email')}}" :value="old('email')"
                                required autofocus>
                        </div>


                        <div class="checkout__input">
                            <p>{{__('login.password')}}<span>*</span></p>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="{{__('login.password')}}" required autocomplete="current-password">
                        </div>
                        <div class="checkout__input__checkbox">
                        <label for="acc">
                            {{__('login.remember')}}
                            <input type="checkbox" class="form-check-input mx-2" id="acc" name="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div>



                    <button type="submit" class="site-btn">{{__('login.login')}}</button>
                    @if (Route::has('password.request'))
                    <div>
                        <br>

                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{__('login.forget')}}
                        </a>
                    </div>
                    @endif

                    <p class="reg"><a href="{{ route('register') }}"> {{__('login.new_user')}}</a></p>


                    </div>

                
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a class="btn btn-danger  m-1" href="{{route('login.google')}}"><i class="fa fa-google"
                            style="color:white"></i></a>

                    <a class="btn btn-primary text-primary  m-1" href="{{route('login.facebook')}}"><i
                            class="fa fa-facebook" style="color:white"></i></a>
                </div>

            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
