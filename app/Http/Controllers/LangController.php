<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LangController extends Controller
{
    public static function lang(){
        return LaravelLocalization::setLocale();
    }
}
