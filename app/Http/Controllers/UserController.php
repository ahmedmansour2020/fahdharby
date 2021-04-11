<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Slider;

class UserController extends Controller
{
    public function home()
    {
        $title = 'الصفحة الرئيسية';
        $sliders = Slider::whereStatus(1)->get();
        foreach ($sliders as $slider) {
            $slider->image = asset('uploaded/' . $slider->image);
            $slider->content = str_replace(" ", "&nbsp;", $slider->content);
            $slider->content = str_replace("\n", "<br>", $slider->content);
        }
        $latest_products = Product::whereStatus(1)->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')->orderBy('id', 'desc')->limit(20)->get();
        $this->product_main_image($latest_products);
        return view('welcome', compact('title', 'sliders', 'latest_products'));
    }
    public static function getParentCategory($limit)
    {
        $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'image')->limit($limit)->get();
        foreach ($categories as $category) {
            $category->image = asset('uploaded/' . $category->image);
        }
        return $categories;
    }
    public function product_main_image($products)
    {
        foreach ($products as $product) {
            $image = ProductImage::whereMain(1)->where('product_id', $product->id)->first();
            if ($image) {

                $product->image = asset('uploaded/' . $image->name);
            }
        }
    }
    public function to_sub_categories($id)
    {
        $main_category = Category::where('id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->first();
        if ($main_category->image != null) {
            $main_category->image = asset('uploaded/' . $main_category->image);
        }
        $title = $main_category->name;
        $sub_categories = Category::where('parent_id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
        foreach ($sub_categories as $category) {
            if ($category->image != null) {
                $category->image = asset('uploaded/' . $category->image);
            }
        }
        return view('home.categories', compact('title', 'main_category', 'sub_categories'));
    }
    public function to_all_categories()
    {
        $title = "جميع التصنيفات";
        $categories = Category::whereNull('parent_id')->select('id', 'name_' . LangController::lang() . ' as name', 'image')->get();
        foreach ($categories as $category) {
            if ($category->image != null) {
                $category->image = asset('uploaded/' . $category->image);
            }
        }
        return view('home.categories', compact('title', 'categories'));
    }

    public function to_products($id)
    {
        $sub_category = Category::where('id', $id)->select('id', 'name_' . LangController::lang() . ' as name', 'image')->first();
        if ($sub_category->image != null) {
            $sub_category->image = asset('uploaded/' . $sub_category->image);
        }
        $title = $sub_category->name;
        $products = Product::
            whereStatus(1)
            ->where('sub_category', $id)
            ->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')
            ->orderBy('id', 'desc')
            ->get();
        foreach ($products as $product) {
            if (strlen($product->description) > 100) {
                $product->description = substr($product->description, 100)."...";
            } 
            $product->description=str_replace("\n","<br>",$product->description);
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'sub_category', 'products'));
    }

    public function orders()
    {
        $title = 'الطلبيات';
        return view('home/orders', compact('title'));
    }
    public function cart()
    {
        $title = 'سلة الطلبات';
        return view('home/cart', compact('title'));
    }
    public function location()
    {
        $title = 'المكان';
        return view('home/location', compact('title'));
    }
    public function pay()
    {
        $title = 'الدفع';
        return view('home/pay', compact('title'));
    }
    public function wallet()
    {
        $title = 'المحفظة';
        return view('home/wallet', compact('title'));
    }
    public function process_pay()
    {
        $title = 'خطوات الدفع';
        return view('home/process-pay', compact('title'));
    }
    public function product_return()
    {
        $title = 'إرجاع المنتج';
        return view('home/product-return', compact('title'));
    }
    public function create_order_return()
    {
        $title = 'إنشاء أمر مرتجع';
        return view('home/create-order-return', compact('title'));
    }

}
