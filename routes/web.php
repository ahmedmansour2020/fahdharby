<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

//auth routes already exist.
// Route::get('register',function(){
//     return view('auth/register');
// });

// Route::get('login',function(){
//     return view('auth/login');
// });
//code here



Route::group(['prefix'=>'admin'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::get('/category/sub/{id}',[CategoryController::class,'index_sub'])->name('category.index_sub');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);
    Route::post('/category/delete/image',[CategoryController::class,'delete_image'])->name('category_delete_image');
    Route::get('/brand/delete/{id}',[BrandController::class,'destroy']);
    Route::post('/brand/delete/image',[BrandController::class,'delete_image'])->name('brand_delete_image');
    Route::get('/product/change/{id}',[ProductController::class,'change_status'])->name('product_change_status');
    
});

Route::group(['prefix'=>'vendor'],function(){
    Route::resource('product',ProductController::class);
    Route::get('/product/delete/{id}',[ProductController::class,'destroy']);

});
//end code here

