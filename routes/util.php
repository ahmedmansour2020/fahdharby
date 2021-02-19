<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Util\UtilityController;


Route::group(['prefix'=>'util'],function(){
    UtilityController::utilRoutes();
 });