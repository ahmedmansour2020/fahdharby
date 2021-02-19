<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
$lang=LaravelLocalization::setLocale();
?>

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('resources/assets/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{__('login.register')}}</h2>
                    <!--  <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Register</span>
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
    <x-jet-validation-errors class="mb-4" />
        <div class="checkout__form">
        <form method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="row justify-content-center @if($lang=='ar') text-right @endif">

                    <div class="col-md-6">

                        <div class="checkout__input">
                            <p>{{__('login.user')}}<span>*</span></p>
                            <x-jet-input id="name"  type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>{{__('login.mobile')}}<span>*</span></p>
                                    <x-jet-input id="mobile" type="text" name="mobile"
                            :value="old('mobile')" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                <p>{{__('login.email')}}<span>*</span></p>
                                    <x-jet-input id="email" type="email" name="email"
                            :value="old('email')" required />
                                </div>
                            </div>
                        </div>




                        <div class="checkout__input">
                            <p>{{__('login.password')}}<span>*</span></p>
                            <x-jet-input id="password" type="password"
                            name="password" required autocomplete="new-password" />
                        </div>
                        <div class="checkout__input">
                            <p>{{__('login.re_password')}}<span>*</span></p>
                            <x-jet-input id="password" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        </div>
           

                        <x-jet-button class="site-btn">
                        {{__('login.register')}}
                        </x-jet-button>




                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
