@extends('layout.layout')
@section('title','Home')
@section('content')
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Login</h3>
                    <p>Welcome Back</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="form-group">
                        <x-jet-button class="btn btn-info">
                            {{ __('Reset Password') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection