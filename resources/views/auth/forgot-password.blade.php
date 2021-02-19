@extends('layout.layout')
@section('title','Forget Password')
@section('content')
<div class="bradcam_area bradcam_bg_4">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3>نسيت كلمة المرور</h3>
                      <p>{{ __('سيتم ارسال رسالة إلى بريدك الاليكتروني المسجل لتغيير كلمة المرور') }}</p>
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
                    <form  method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">البريد الاليكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="ادخل البريد الاليكتروني" :value="old('email')" required autofocus>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('رابط تغيير كلمة المرور') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
