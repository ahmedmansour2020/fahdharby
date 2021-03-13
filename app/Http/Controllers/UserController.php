<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $title='الصفحة الرئيسية';
        return view('welcome',compact('title'));
    }
    public function orders(){
        $title='الطلبيات';
        return view('home/orders',compact('title'));
    }
    public function cart(){
        $title='سلة الطلبات';
        return view('home/chart',compact('title'));
    }
    public function location(){
        $title='المكان';
        return view('home/location',compact('title'));
    }
    public function pay(){
        $title='الدفع';
        return view('home/pay',compact('title'));
    }
    public function wallet(){
        $title='المحفظة';
        return view('home/wallet',compact('title'));
    }
    public function process_pay(){
        $title='خطوات الدفع';
        return view('home/process-pay',compact('title'));
    }
    public function product_return(){
        $title='إرجاع المنتج';
        return view('home/product-return',compact('title'));
    }
    public function create_order_return(){
        $title='إنشاء أمر مرتجع';
        return view('home/create-order-return',compact('title'));
    }
    
}
