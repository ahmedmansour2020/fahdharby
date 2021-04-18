<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\NotificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//for languages
// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
// });
Route::resource('review',ReviewController::class);
Route::resource('order',OrderController::class);

Route::get('redirect_to_product/{id}',[UserController::class,'redirect_to_product'])->name('redirect_to_product')->middleware('auth');

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('cart', [UserController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('purchase/{id}', [UserController::class, 'purchase'])->name('purchase')->middleware('auth');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'user']], function () {
    Route::get('/', [DashboardController::class, 'orders'])->name('dashboard');
    Route::get('orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('location', [DashboardController::class, 'location'])->name('location');
    Route::get('pay', [DashboardController::class, 'pay'])->name('pay');
    Route::get('wallet', [DashboardController::class, 'wallet'])->name('wallet');
    Route::get('process-pay', [DashboardController::class, 'process_pay'])->name('process-pay');
    Route::get('product-return', [DashboardController::class, 'product_return'])->name('product-return');
    Route::get('create-order-return', [DashboardController::class, 'create_order_return'])->name('create-order-return');

    Route::post('save_location',[DashboardController::class, 'save_location'])->name('save_location');
});
Route::post('add_to_cart',[UserController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('change_cart_qty',[UserController::class, 'change_cart_qty'])->name('change_cart_qty');

Route::get('remove_from_cart/{id}', [UserController::class, 'remove_from_cart'])->name('remove_from_cart');

Route::get('categories', [UserController::class, 'to_all_categories'])->name('to_all_categories');
Route::get('categories/{id}', [UserController::class, 'to_sub_categories'])->name('categories');

Route::get('products/{id}',[UserController::class,'to_products'])->name('products');

Route::get('product-details/{id}', [UserController::class,'product_details'])->name('product-details');
Route::post('add_promocode',[PromocodeController::class,'add_promocode'])->name('add_promocode');
Route::get('checkout', [UserController::class,'checkout'])->name('checkout')->middleware('auth');


Route::get('orders-no-product', function () {
    return view('home/orders-no-product');
})->name('orders-no-product');

Route::get('no-location', function () {
    return view('home/no-location');
})->name('no-location');

Route::get('payments', function () {
    return view('vendor/show/payments');
})->name('payments');

Route::get('orders-dashboard', function () {
    return view('vendor/show/orders-dashboard');
})->name('orders-dashboard');

Route::get('return-requests', function () {
    return view('vendor/show/return-requests');
})->name('return-requests');

Route::get('complaints-department', function () {
    return view('vendor/show/complaints-department');
})->name('complaints-department');

Route::get('rate', function () {
    return view('vendor/show/rate');
})->name('rate');

Route::get('financial-account', function () {
    return view('vendor/show/financial-account');
})->name('financial-account');

Route::get('complaints-withdraw-money', function () {
    return view('vendor/show/complaints-withdraw-money');
})->name('complaints-withdraw-money');

Route::get('account', function () {
    return view('vendor/show/account');
})->name('account');

Route::get('contact-us', function () {
    return view('home/contact-us');
})->name('contact-us');









Route::get('rate', function () {
    return view('home/rate');
})->name('rate');

//code here

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('approval', ApprovalController::class);
    Route::resource('promocode', PromocodeController::class);

    Route::get('/', [VendorController::class, 'dashboard_admin'])->name('admin');
    Route::get('/notifications', [NotificationController::class, 'get_current_notifications'])->name('get_current_notifications');
    Route::get('/category/sub/{id}', [CategoryController::class, 'index_sub'])->name('category.index_sub');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('/promocode/delete/{id}', [PromocodeController::class, 'destroy']);
    Route::post('/category/delete/image', [CategoryController::class, 'delete_image'])->name('category_delete_image');
    Route::get('/brand/delete/{id}', [BrandController::class, 'destroy']);
    Route::post('/brand/delete/image', [BrandController::class, 'delete_image'])->name('brand_delete_image');
    Route::get('/product/change/{id}', [ProductController::class, 'change_status'])->name('product_change_status');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show.admin');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);
    Route::post('/change_product_status', [ApprovalController::class, 'change_product_status'])->name('change_product_status');
    Route::post('/change_offer_status', [ApprovalController::class, 'change_offer_status'])->name('change_offer_status');
    Route::get('/offer/delete/{id}', [ProductController::class, 'delete_offer']);
    Route::get('/settings/info', [SettingController::class, 'to_info'])->name('setting.info');
    Route::get('/settings/sliders', [SettingController::class, 'to_sliders'])->name('setting.sliders');
    Route::get('/settings/sliders/create', [SettingController::class, 'create_slider'])->name('create.slider');
    Route::get('/setting/slider/{id}', [SettingController::class, 'edit_slider']);
    Route::get('/setting/slider/delete/{id}', [SettingController::class, 'delete_slider']);
    Route::post('/settings/sliders/store', [SettingController::class, 'save_slider'])->name('save_slider');
    Route::put('/settings/sliders/update/{id}', [SettingController::class, 'update_slider'])->name('update_slider');
    Route::post('/settings/slider/delete/image', [SettingController::class, 'slider_delete_image'])->name('slider_delete_image');
    Route::post('/change_slider_status', [SettingController::class, 'change_slider_status'])->name('change_slider_status');


    Route::post('/save_info', [SettingController::class, 'save_info'])->name('info.save');
});

Route::group(['prefix' => 'supplier', 'middleware' => ['auth', 'vendor']], function () {
    Route::resource('product', ProductController::class);
    Route::get('/', [VendorController::class, 'dashboard'])->name('vendor');
    Route::get('/product?stored=true', [ProductController::class, 'index'])->name('product.stored');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');
    Route::get('/offers/products', [ProductController::class, 'to_products_offers'])->name('product.offers');
    Route::get('/offers/product/{id}', [ProductController::class, 'to_product_offers']);
    Route::get('/offer/delete/{id}', [ProductController::class, 'delete_offer']);
    Route::get('/edit-quantity/{id}/{qty}', [ProductController::class, 'edit_qty']);
    Route::get('/make-zero/{id}', [ProductController::class, 'make_zero']);
    
    Route::get('/set-main-image/{id}', [ProductController::class, 'to_main_image'])->name('main_image');
    Route::post('/set_main_image', [ProductController::class, 'set_main_image'])->name('image.main');
    Route::post('/add_offer', [ProductController::class, 'add_offer'])->name('add_offer');
    
    Route::get('main-add-product', function () {
        return view('vendor/show/main-add-product');
    })->name('main-add-product');

});
//end code here
