<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard(){
        $title="لوحة تحكم التاجر";
        return view('vendor/show/home-vendor',compact('title'));
    }
}