<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                $product->description = substr($product->description, 100) . "...";
            }
            $product->description = str_replace("\n", "<br>", $product->description);
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'sub_category', 'products'));
    }

    public function product_details($id)
    {
        $product = Product::where('id', $id)->whereStatus(1)->select('sub_category', 'duration', 'qty', 'price', 'user_id', 'id', 'name_' . LangController::lang() . ' as name', 'description_' . LangController::lang() . ' as description')->firstOrFail();
        $images = ProductImage::where('product_id', $id)->get();
        $title = $product->name;
        $supplier = User::find($product->user_id);

        $user = Auth::user();
        $check_auth = false;
        $check_cart = false;
        if ($user) {
            $check_auth = true;
            $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->whereStatus(0)->first();
            if ($cart) {
                $check_cart = true;
            }
        }

        $related_products = Product::
            where('sub_category', $product->sub_category)
            ->whereStatus(1)
            ->where('id', '<>', $product->id)
            ->select('duration', 'qty', 'price', 'user_id', 'id', 'name_' . LangController::lang() . ' as name', 'description_' . LangController::lang() . ' as description')
            ->get();
        $this->product_main_image($related_products);
        foreach ($related_products as $item) {
            $check_cart_related = false;
            if ($user) {
                $cart_item = Cart::where('user_id', $user->id)->where('product_id', $item->id)->whereStatus(0)->first();
                if ($cart_item) {
                    $check_cart_related = true;
                }
            }
            $item->check_cart_related = $check_cart_related;
        }
        $reviews = Review::
            leftJoin('users', 'users.id', 'user_id')
            ->where('product_id', $product->id)
            ->whereStatus(1)
            ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
            ->orderBy('reviews.id', 'desc')
            ->get();
        $check_review = false;

        if($user){
            $review = Review::where('product_id', $product->id)->where('user_id', $user->id)->first();
            if ($review) {
                $check_review = true;
            }
        }else{
            $check_review = true;
        }


        $total = 5 * count($reviews);
        $total_reviews = 0;
        foreach ($reviews as $review) {
            $total_reviews += $review->rate;
        }
        if (count($reviews) == 0) {
            $reviews_stars = 0;
        } else {

            $reviews_stars = (100 * $total_reviews / $total);
        }
        return view('home.product-details', compact('reviews_stars','check_review', 'title', 'reviews', 'images', 'product', 'supplier', 'check_auth', 'check_cart', 'related_products'));
    }

    public function add_to_cart(Request $request)
    {
        $user = Auth::user();
        $product_id = request('product_id');
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product_id;
        $cart->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function cart()
    {
        $title = 'سلة الطلبات';
        $user=Auth::user();
        $products=Cart::leftJoin('products','products.id','product_id')
        ->where('carts.user_id',$user->id)
        ->select('products.*','products.description_'.LangController::lang().' as description','products.name_'.LangController::lang().' as name','carts.id as cart_id','carts.qty as cart_qty')
        ->get();
        $this->product_main_image($products);
        return view('home/cart', compact('title','products'));
    }
    public function orders()
    {
        $title = 'الطلبيات';
        return view('home/orders', compact('title'));
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

    public function redirect_to_product($id)
    {
        $user = Auth::user();
        if ($user) {
            return redirect()->route('product-details', $id);
        } else {
            return '';
        }
    }

}
