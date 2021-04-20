<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LangController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOffer;
use App\Models\Promocode;
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
        $user = Auth::user();
        $check_auth = false;
        if ($user) {
            $check_auth = true;
        }
        $title = 'الصفحة الرئيسية';
        $sliders = Slider::whereStatus(1)->get();
        foreach ($sliders as $slider) {
            $slider->image = asset('uploaded/' . $slider->image);
            $slider->content = str_replace(" ", "&nbsp;", $slider->content);
            $slider->content = str_replace("\n", "<br>", $slider->content);
        }
        $latest_products = Product::whereStatus(1)->select('id', 'name_' . LangController::lang() . ' as name', 'price', 'description_' . LangController::lang() . ' as description')->orderBy('id', 'desc')->limit(20)->get();
        foreach ($latest_products as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
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
            $product->reviews_stars = $reviews_stars;
            $product->reviews = count($reviews);

            $check_cart_related = false;
            if ($user) {
                $cart_item = Cart::where('user_id', $user->id)->where('product_id', $product->id)->whereStatus(0)->first();
                if ($cart_item) {
                    $check_cart_related = true;
                }
            }
            $product->check_cart_related = $check_cart_related;
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }

        $this->product_main_image($latest_products);
        return view('welcome', compact('title', 'sliders', 'latest_products', 'check_auth'));
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
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
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
        $offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
        if ($offer) {
            $product->old_price = $product->price;
            $product->price = (int) ($product->price - ($product->price * $offer->offer / 100));
        } else {
            $product->old_price = null;
        }
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
            $related_offer = ProductOffer::where('product_id', $item->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $item->old_price = $item->price;
                $item->price = (int) ($item->price - ($item->price * $related_offer->offer / 100));
            } else {
                $item->old_price = null;
            }
        }
        $reviews = Review::
            leftJoin('users', 'users.id', 'user_id')
            ->where('product_id', $product->id)
            ->whereStatus(1)
            ->select('reviews.*', 'users.name as user', 'avatar', DB::raw('date(reviews.created_at) as date'))
            ->orderBy('reviews.id', 'desc')
            ->get();
        $check_review = false;

        if ($user) {
            $review = Review::where('product_id', $product->id)->where('user_id', $user->id)->first();
            if ($review) {
                $check_review = true;
            }
        } else {
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
        return view('home.product-details', compact('reviews_stars', 'check_review', 'title', 'reviews', 'images', 'product', 'supplier', 'check_auth', 'check_cart', 'related_products'));
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
        $user = Auth::user();
        $products = Cart::leftJoin('products', 'products.id', 'product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->select('products.*', 'products.description_' . LangController::lang() . ' as description', 'products.name_' . LangController::lang() . ' as name', 'carts.id as cart_id', 'carts.qty as cart_qty')
            ->get();
        $this->product_main_image($products);
        foreach ($products as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
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
            $product->reviews_stars = $reviews_stars;
            $product->reviews = count($reviews);
            $product->supplier = User::find($product->user_id)->name;
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        return view('home/add_to_cart', compact('title', 'products'));
    }
    public function change_cart_qty(Request $request)
    {
        $id = request('id');
        $qty = request('qty');
        $cart = Cart::find($id);
        $cart->qty = $qty;
        $cart->save();
        $user = Auth::user();
        $all_cart = Cart::leftJoin('products', 'products.id', 'carts.product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->select('products.price', 'carts.qty', 'products.id', 'products.qty as product_qty')
            ->get();
        foreach ($all_cart as $item) {
            if ($item->product_qty - $item->qty <= 0) {
                $item->qty = 0;
            }
            $offer = ProductOffer::where('product_id', $item->id)->whereStatus(1)->whereApproved(1)->first();
            if ($offer) {
                $item->total = (int) ($item->price - ($item->price * $offer->offer / 100)) * $item->qty;
            } else {
                $item->total = $item->price * $item->qty;
            }
        }
        $total = 0;
        foreach ($all_cart as $item) {
            $total += $item->total;
        }
        return response()->json([
            'success' => true,
            'total' => $total,
        ]);
    }
    public function remove_from_cart($id)
    {
        $user = Auth::user();
        $exist = Cart::where('user_id', $user->id)->where('id', $id)->first();

        if ($exist) {
            Cart::find($id)->delete();
        }
        return redirect()->back();
    }

    public function checkout()
    {
        $title = "إتمام عملية الدفع";
        $user = Auth::user();
        $products = Cart::leftJoin('products', 'products.id', 'product_id')
            ->where('carts.user_id', $user->id)
            ->where('carts.status', 0)
            ->where(DB::raw('products.qty-carts.qty'), '>', 0)
            ->select('products.*', 'products.description_' . LangController::lang() . ' as description', 'products.name_' . LangController::lang() . ' as name', 'carts.id as cart_id', 'carts.qty as cart_qty')
            ->get();
        $subtotal = 0;
        foreach ($products as $product) {
            $reviews = Review::
                leftJoin('users', 'users.id', 'user_id')
                ->where('product_id', $product->id)
                ->whereStatus(1)
                ->select('reviews.*', 'users.name as user', DB::raw('date(reviews.created_at) as date'))
                ->orderBy('reviews.id', 'desc')
                ->get();
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
            $subtotal += $product->price * $product->cart_qty;
        }

        $promocodes = $this->get_user_promocodes($subtotal);
        $discount = 0;
        foreach ($promocodes as $promocode) {
            $discount += $promocode->remain;
        }
        if ($discount > $subtotal) {
            $discount = $subtotal;
        }
        $total = $subtotal - $discount;
        return view('home/checkout', compact('title', 'products', 'subtotal', 'discount', 'total'));
    }
    public function purchase($id)
    {
        $order = Order::find($id);

        $title = "إتمام عملية الشراء";
        if ($order->status == 0) {

            return view('home/purchase', compact('id', 'title'));
        } else {
            return redirect()->back();
        }
    }
    public function get_user_promocodes($price)
    {
        $user = Auth::user();
        $date = date('Y-m-d');
        $promocodes = Promocode::leftJoin('promocode_users', 'promocode_users.promocode_id', 'promocodes.id')
            ->where('user_id', $user->id)
            ->where('promocodes.start', '<=', $date)
            ->where('promocodes.end', '>=', $date)
            ->where('promocodes.minimum', '<=', $price)
            ->where(DB::raw('(promocodes.value-promocode_users.spent)'), '>', 0)
            ->select(DB::raw('(promocodes.value-promocode_users.spent) as remain'), 'promocode_users.id', 'promocode_users.spent', 'promocode_id')
            ->orderBy('remain', 'asc')
            ->get();

        return $promocodes;
    }

    public function search(Request $request)
    {
        $word = request('search');
        $title=" نتائج بحث : ".$word;
        $products = Product::
            leftJoin('brands', 'brands.id', 'brand_id')
            ->select('products.*', 'products.name_ar as name', 'products.description_ar as description')
            ->whereStatus(1);
        $products->where(function ($query) use ($word) {
            $query->where('products.name_ar', 'like', '%' . $word . '%')
                ->orWhere('products.description_ar', 'like', '%' . $word . '%')
                ->orWhere('brands.name_ar', 'like', '%' . $word . '%');
        });
        $products = $products->get();

        foreach ($products as $product) {
            if (strlen($product->description) > 100) {
                $product->description = substr($product->description, 100) . "...";
            }
            $product->description = str_replace("\n", "<br>", $product->description);
            $related_offer = ProductOffer::where('product_id', $product->id)->whereStatus(1)->whereApproved(1)->first();
            if ($related_offer) {
                $product->old_price = $product->price;
                $product->price = (int) ($product->price - ($product->price * $related_offer->offer / 100));
            } else {
                $product->old_price = null;
            }
        }
        $this->product_main_image($products);
        return view('home.products', compact('title', 'products'));
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
