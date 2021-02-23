<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//for languages
// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
// });

Route::get('/',function(){
    return view('welcome');
})->name('home');


Route::get('register',function(){
    return view('auth/register');
});

Route::get('login',function(){
    return view('auth/login');
});
//code here



//end code here

