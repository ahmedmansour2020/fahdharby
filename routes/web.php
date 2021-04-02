<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VendorController;
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

Route::get('/',[UserController::class,'home'])->name('home');
Route::get('cart',[UserController::class,'cart'])->name('chart');
Route::get('orders',[UserController::class,'orders'])->name('orders');
Route::get('location',[UserController::class,'location'])->name('location');
Route::get('pay',[UserController::class,'pay'])->name('pay');
Route::get('wallet',[UserController::class,'wallet'])->name('wallet');
Route::get('process-pay',[UserController::class,'process_pay'])->name('process-pay');
Route::get('product-return',[UserController::class,'product_return'])->name('product-return');
Route::get('create-order-return',[UserController::class,'create_order_return'])->name('create-order-return');

Route::get('orders-no-product',function(){
    return view('home/orders-no-product');
})->name('orders-no-product');

Route::get('no-location',function(){
    return view('home/no-location');
})->name('no-location');



Route::get('management',function(){
    return view('vendor/show/management');
})->name('management');

Route::get('payments',function(){
    return view('vendor/show/payments');
})->name('payments');

Route::get('orders-dashboard',function(){
    return view('vendor/show/orders-dashboard');
})->name('orders-dashboard');

Route::get('return-requests',function(){
    return view('vendor/show/return-requests');
})->name('return-requests');

Route::get('complaints-department',function(){
    return view('vendor/show/complaints-department');
})->name('complaints-department');

Route::get('rate',function(){
    return view('vendor/show/rate');
})->name('rate');

Route::get('financial-account',function(){
    return view('vendor/show/financial-account');
})->name('financial-account');

Route::get('complaints-withdraw-money',function(){
    return view('vendor/show/complaints-withdraw-money');
})->name('complaints-withdraw-money');

Route::get('account',function(){
    return view('vendor/show/account');
})->name('account');


//code here



Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::get('/',function(){
        return view('welcome');
    })->name('admin');
    Route::get('/category/sub/{id}',[CategoryController::class,'index_sub'])->name('category.index_sub');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);
    Route::post('/category/delete/image',[CategoryController::class,'delete_image'])->name('category_delete_image');
    Route::get('/brand/delete/{id}',[BrandController::class,'destroy']);
    Route::post('/brand/delete/image',[BrandController::class,'delete_image'])->name('brand_delete_image');
    Route::get('/product/change/{id}',[ProductController::class,'change_status'])->name('product_change_status');
    
});

Route::group(['prefix'=>'vendor','middleware'=>['auth','vendor']],function(){
    Route::resource('product',ProductController::class);
    Route::get('/',[VendorController::class,'dashboard'])->name('vendor');
    Route::get('/product?stored=true',[ProductController::class,'index'])->name('product.stored');
    Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
    Route::get('main-add-product',function(){
        return view('vendor/show/main-add-product');
    })->name('main-add-product');

});
//end code here

