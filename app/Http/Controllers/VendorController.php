<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;

class VendorController extends Controller
{
    public function dashboard()
    {
        $title = "لوحة تحكم التاجر";
        return view('vendor/show/home-vendor', compact('title'));
    }
    public function dashboard_admin()
    {
        $title = "لوحة تحكم المسئول";
        return view('vendor/show/home-vendor', compact('title'));
    }
    public function orders()
    {   $search = request('search');
        $status = request('tab');
        $title = "الطلبات";
        $user = Auth::user();
        if (request()->ajax()) {
            $orders = Product::join('order_items', 'order_items.product_id', 'products.id')
                ->join('orders', 'orders.id', 'order_id')
                ->leftJoin('users', 'users.id', 'orders.user_id')
                ->leftJoin('categories', 'categories.id', 'sub_category')
                ->where('products.user_id', $user->id)
                ->select('products.id', 'products.name_ar as name', 'order_id', 'users.name as user', 'orders.status', DB::raw('date(orders.created_at) as date'), 'order_items.qty', 'order_items.total')
                ->orderBy('orders.id', 'desc');
                if($status!=null){
                    $orders->where('orders.status',$status);
                }
                if ($search) {
                    $orders->where(function ($query) use ($search) {
                        $query->where('products.name_' . LangController::lang(), 'like', '%' . $search . '%')
                            ->orWhere('categories.name_' . LangController::lang(), 'like', '%' . $search . '%');
                    });
                }
                $orders=$orders->get();

            $uc = new UserController();
            $uc->product_main_image($orders);
            return datatables()->of($orders)->addIndexColumn()->make(true);
        }
        return view('vendor/show/orders-dashboard', compact('title'));
    }
}
